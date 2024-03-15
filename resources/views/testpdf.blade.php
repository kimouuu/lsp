<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
</head>

<body>
    <h1>Title : {{ $title }}</h1>
    <p>Date: {{ $date }}</p>
    <table>
        @foreach ($users as $user)
        <tr>
            <td>{{$user['email']}}</td>
            <td>{{$user['lavel']}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>