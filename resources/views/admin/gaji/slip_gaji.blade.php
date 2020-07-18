<html>
<head>
    <title>CETAK SLIP PEMBAYARAN</title>
</head>
<body onload="window.print()">
@foreach($gajis as $gaji)
<table align="center" width="600px" border="1" cellpadding="0" cellspacing="0" style="border:1px solid #C3B8B8;">
    <tr>    
        <td width="13%" align="center" style="vertical-align:middle;">LOGO</td>
        <td width="37%" align="center" style="vertical-align:middle;">
            <span>
                <strong>NAMA PERUSAHAAN</strong><br>
                <span style="font-size:11pt;">Alamat Jalan</span> <br>
                <strong style="font-size:11pt;">KABUPATEN</strong>
            <span>
        </td>
        <td width="50%" align="center" style="vertical-align:middle;">
            <span>
                <span style="font-size:11pt;">Telah dibayar kepada :<br></span>
                <span><strong>{{ strtoupper($gaji->nama_pegawai) }}</strong><br></span>
                <span style="font-size:11pt;">{{ strtoupper($gaji->bidang_kerja) }}</span>
            <span>
        </td>
    </tr>
    <tr>
        <td colspan="3" style="font-size:11pt;">SLIP GAJI BULAN {{ strtoupper(session('bulan')) }} {{ session('tahun') }}</td>
    </tr>
    <tr>
        <td colspan="3">
            <table width="100%" border="1" cellpadding="1" cellspacing="0" style="border:1px solid #C3B8B8;">
                <tr>
                    <td width="5%" style="border-top:0px;border-left:0px;font-size:11pt;" align="center"><strong>No</strong></td>
                    <td style="border-top:0px;font-size:11pt;"><strong>Uraian Gaji Pegawai</strong></td>
                    <td colspan="2" width="30%" style="border-top:0px;border-right:0px;font-size:11pt;" align="center"><strong>Jumlah</strong></td>
                </tr>
                <tr>
                    <td style="border-left:0px;font-size:11pt;" align="center">1</td>
                    <td style="font-size:11pt;">Gaji Pokok</td>
                    <td width="5%" style="border-right:0px;font-size:11pt;" align="left"> Rp.</td>
                    <td style="border-right:0px; border-left:0px;font-size:11pt;" align="right">{{ format_rp($gaji->gapok) }},- </td>
                </tr>
                <tr>
                    <td style="border-left:0px;font-size:11pt;" align="center">2</td>
                    <td style="font-size:11pt;">Tunjangan</td>
                    <td width="5%" style="border-right:0px;font-size:11pt;" align="left"> Rp.</td>
                    <td style="border-right:0px;font-size:11pt;border-left:0px;" align="right">{{ format_rp($gaji->tunjangan) }},- </td>
                </tr>
                <tr>
                    <td style="border-left:0px;font-size:11pt;" align="center">3</td>
                    <td style="font-size:11pt;">Potongan</td>
                    <td width="5%" style="border-right:0px;font-size:11pt;" align="left"> Rp.</td>
                    <td style="border-right:0px;font-size:11pt;border-left:0px;" align="right">{{ format_rp($gaji->potongan) }},- </td>
                </tr>
                <tr>
                    <td colspan="2" style="border-bottom:0px;border-left:0px;font-size:11pt;"><strong>JUMLAH PENERIMAAN</strong></td>
                    <td width="5%" style="border-bottom:0px;border-right:0px;font-size:11pt;" align="left"> <strong>Rp.</strong></td>
                    <td style="border-bottom:0px;border-right:0px;font-size:11pt;border-left:0px;" align="right"><strong>{{ format_rp($gaji->gapok + $gaji->tunjangan - $gaji->potongan) }},- </strong></td>
                </tr>
            </table>
        </td>
    </tr>
    
</table>
@endforeach
<br>

<table width="600px" align="center">
    <tr>
        <td width="60%">&nbsp;</td>
        <td style="font-size:11pt;">Bandar Lampung, {{ tgl_indo(date('Y-m-d')) }}</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td style="font-size:11pt;">Bendahara</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td style="font-size:11pt;"><br><br><br><strong>{{ Auth::user()->name }}</strong></td>
    </tr>
</table>

</body>
</html>