<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Load Home</title>

  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        #resultlist{
            align : left;
            position:absolute;
            width : 81.5%;
            max-width: 89%;
            cursor : pointer;
            overflow-y: auto;
            overflow-x: auto;
            max-height: 400px;
            box-sizing: border-box;
            z-index: 1001;
        }

        .link-class:hover{
            background-color: #f1f1f1;
            cursor:pointer;
        }

        
    </style>

</head>
<body>
    <div class="container">
        <h1 class="mt-4" align="center">PHP AJAX SMK TARUNA BHAKTI</h1>
        <h2 align="center" class= "mb-4 mt-4">AUTOCOMPLATE dengan AJAX dan GAMBAR</h2>

        <div align="center">
            <input type="text" id="nama_siswa" placeholder="Cari Siswa..." class="form-control">
        </div>

        <ul class="list-group" id="resultlist" ></ul>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
            cache: false
        });
        $('#nama_siswa').keyup(function () {
            $('#resultlist').html('');
            $('#state').val('');
            let nama_siswa = $('#nama_siswa').val();
            $.ajax({
                type: 'POST',
                url: "get_data.php",
                data: {
                    nama_siswa: nama_siswa
                },
            success: function (data) {
                $.each(JSON.parse(data), function (key, value) {
                $('#resultlist').append(`
                    <li class="list-group-item link-class">
                        <img src="avatar/` + value.avatar + `" height="40" width="40" class="img-thumbnail" /> 
                        <span class="nama">` + value.nama_siswa + `</span>
                        <span class="text-muted" style="float: right;">` + value.alamat + `</span>
                    </li>`);
                });
            }
        });
    });
        $('#resultlist').on('click', 'li', function () {
                let nama_siswa = $(this).children('.nama').text();
                $('#nama_siswa').val(nama_siswa);
                $("#resultlist").html('');
            });
        });
    </script>
</body>
</html>