@foreach($gaji as $g)
<tr>
    <td>Gaji Pokok</td>
    <td>Rp. {{ format_rp($g->gapok) }}<input type="hidden" value="{{ $g->gapok }}" name="gapok"></td>
</tr>
<tr>
    <td>Tunjangan</td>
    <?php
    foreach($penempatan as $tempat){
        if($tempat->status=='KOORDINATOR'){
            $tunjangan = $g->tunjangan;
        }else{
            $tunjangan = 0;
        }
    }
    ?>
    <td>Rp. {{ format_rp($tunjangan) }}<input type="hidden" value="{{ $tunjangan }}" name="tunjangan"></td>
</tr>
<tr>
    <td>Gaji Total</td>
    <td>Rp. {{ format_rp($g->gapok + $tunjangan) }}<input type="hidden" value="{{ $g->gapok + $tunjangan}}" name="total_gaji"></td>
</tr>
<tr>
    <td>Potongan</td>
    <td><input type="number" value="0" class="form-control" name="potongan" placeHolder="Potongan"></td>
</tr>
@endforeach
