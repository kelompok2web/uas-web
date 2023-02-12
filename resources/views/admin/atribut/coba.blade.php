<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border=1>
        <tr>
            <th>NIM</th>
            <th>IPK</th>
            <th>Penghasilan Ortu/bln</th>
            <th>Jumlah Tanggungan Orgtua</th>
            <th>Prestasi</th>
            <th>Lokasi</th>
            <th>sum</th>
            <th>Rangking</th>
        </tr>
        <tr>
            <td colspan="100%">LEVEL 1</td>
        </tr>
        @foreach ($DATA as $item)
            <tr>
                <td>{{ $item->nim_mahasiswa }}</td>
                <td>{{ $item->p1 }}</td>
                <td>{{ $item->p2 }}</td>
                <td>{{ $item->p3 }}</td>
                <td>{{ $item->p4 }}</td>
                <td>{{ $item->p5 }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="100%">LEVEL 2</td>
        </tr>
        @foreach ($DATA as $item)
            <tr>
                <td>{{ $item->nim_mahasiswa }}</td>
                <td>{{ $item->p1_level2 }}</td>
                <td>{{ $item->p2_level2 }}</td>
                <td>{{ $item->p3_level2 }}</td>
                <td>{{ $item->p4_level2 }}</td>
                <td>{{ $item->p5_level2 }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="100%">LEVEL 3</td>
        </tr>
        @foreach ($DATA as $item)
            <tr>
                <td>{{ $item->nim_mahasiswa }}</td>
                <td>{{ $item->p1_level3 }}</td>
                <td>{{ $item->p2_level3 }}</td>
                <td>{{ $item->p3_level3 }}</td>
                <td>{{ $item->p4_level3 }}</td>
                <td>{{ $item->p5_level3 }}</td>
                <td>{{ $item->pSum_level3 }}</td>
                <td>{{ $item->ranking }}</td>
            </tr>
        @endforeach
    </table>
    <br>
    <br>

    <table border="1">
        <tr>
            <th>Atriibut</th>
            <th colspan="100%">Value</th>
        </tr>
        <tr>
            <td>MAX</td>
            @foreach ($MAX as $d)
                <td>{{ $d }}</td>
            @endforeach
        </tr>
        <tr>
            <td>MIN</td>
            @foreach ($MIN as $d)
                <td>{{ $d }}</td>
            @endforeach
        </tr>
        <tr>
            <td>BOBOT</td>
            @foreach ($BOBOT as $d)
                <td>{{ $d }}</td>
            @endforeach
        </tr>
</body>

</html>