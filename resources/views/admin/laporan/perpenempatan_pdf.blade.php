<!DOCTYPE html>
<html>
<head>
    <title>LAPORAN PENEMPATAN PEGAWAI PER PERUSAHAAN MITRA</title>
    <link rel="shortcut icon" href="{{url('assets/dist/img/logo.png')}}">
    <style type="text/css">
        #outtable {
            padding: 20px;
            border: 1px solid #e3e3e3;
            width: 100%;
            border-radius: 5px;
        }

        .short {
            width: 25px;
        }

        .normal {
            width: 50px;
        }

        .lebar {
            width: 100px;
        }

        @page {
            size: A4 potrait;
            margin: 2cm;
        }

        p {
            line-height: 0.5;
            font-family: Helvetica;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Helvetica;
            font-size: 10pt;
            color: #5E5B5C;
        }

        table td {
            border: 1px solid #C3B8B8;
            padding: 3px;
            vertical-align: middle;
        }

        thead th {
            border: 1px solid #FFFFFF;
            padding: 3px;
            font-weight: bold;
            text-align: center;
            background-color: #525659;
            color: #FFFFFF;
        }

        tfoot td {
            border: 0px solid #FFFFFF;
            padding: 3px;
            vertical-align: middle;
        }

        #ttd {
            border: 0px solid #FFFFFF;
            padding: 3px;
            vertical-align: middle;
            font-size:11pt;
        }

    </style>
</head>
<body onload="window.print();">
<table width="100%" border="0">
    <tbody>
        <tr>
            <th width="75px"><img src="{{ url('assets/dist/img/logo.png') }}" width="75"></th>
            <th align="center" valign="middle" style="font-family: 'Arial Narrow'; color: #000000;">
                <p align="center" style="font-size:16px">LAPORAN PENEMPATAN PEGAWAI PER PERUSAHAAN MITRA</p>
                <!--p align="center" style="font-size:18px">UNIVERSITAS TEKNOKRAT INDONESIA</p-->
            </th>
            <th width="75px">&nbsp;</th>
        </tr>
    </tbody>
</table>
<hr style="border: 1px solid black;">
<table width="100%" border="0">
    <thead>
        <tr>
            <td align="center"><strong>No</strong></td>
            <td align="center"><strong>NIK</strong></td>
            <td align="center"><strong>Nama Pegawai</strong></td>
            <td align="center"><strong>Nama Perusahaan</strong></td>
            <td align="center"><strong>Status</strong></td>
        </tr>
    </thead>
    <tbody>
        @foreach($penempatan as $p)
        <tr>
            <td align="center">{{$loop->iteration}}</td>
            <td>{{ $p->nik }}</td>
            <td>{{ $p->nama_pegawai }}</td>
            <td>{{ $p->nama_mitra }}</td>
            <td>{{ $p->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<br>
<table width="100%"  align="center">
    <tr>
        <td id="ttd" width="60%">&nbsp;</td>
        <td id="ttd" style="font-size:11pt;">Bandar Lampung, {{ tgl_indo(date('Y-m-d')) }}</td>
    </tr>
    <tr>
        <td id="ttd">&nbsp;</td>
        <td id="ttd" style="font-size:11pt;">Bendahara</td>
    </tr>
    @foreach($hrd as $hr)
    <tr>
        <td id="ttd">&nbsp;</td>
        <td id="ttd" style="font-size:11pt;"><br><br><br><strong>{{ $hr->name }}</strong></td>
    </tr>
    @endforeach
</table>

</body>
</html>