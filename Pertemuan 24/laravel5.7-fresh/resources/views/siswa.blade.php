<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Siswa SMKN 4 Bandung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>

    <h1 class="text-center p-5">Daftar Siswa SMKN 4 Bandung</h1>
    <div class="container">
        <div class="row">
            <table class="table table-striped" border="1">
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Golongan Darah</th>
                </tr>
                @foreach ($siswa as $row)
                <tr>
                    <td>{{ isset($i) ? ++$i : $i = 1 }}</td>
                    <td>{{ $row -> nama_lengkap }}</td>
                    <td>{{ $row -> jenkel }}</td>
                    <td>{{ $row -> goldar }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>