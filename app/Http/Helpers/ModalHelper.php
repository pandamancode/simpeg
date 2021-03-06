<?php 
if (! function_exists('show_my_modal')) {
    function show_my_modal($content='', $id='', $data='', $size='md')
    {
        if ($content != '') {
            $view_content = view($content, $data);
            return '<div class="modal fade" id="' .$id .'" role="dialog" data-backdrop="static" data-keyboard="false">
                      <div class="modal-dialog modal-' .$size .'" role="document">
                        <div class="modal-content">
                            ' .$view_content .'
                        </div>
                      </div>
                    </div>';
        }
    }
}

if ( ! function_exists('bulan'))
{
    function bulan($bln)
    {
        switch ($bln)
        {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }
}

if ( ! function_exists('format_rp'))
{
    function format_rp($angka)
    {
        $rupiah=number_format($angka,0,',','.');
        return $rupiah;
    }
}

if ( ! function_exists('tgl_indo'))
{
    function tgl_indo($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);  //memecah variabel berdasarkan -
        $tanggal = $pecah[2];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.' '.$bulan.' '.$tahun; //hasil akhir
    }
}