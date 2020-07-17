@foreach($gaji as $g)
<tr>
    <td>Gaji Pokok</td>
    <td>{{ $g->gapok }}<input type="hidden" value="{{ $g->gapok }}" name="gapok"></td>
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
    <td>{{ $tunjangan }}<input type="hidden" value="{{ $tunjangan }}" name="tunjangan"></td>
</tr>
<tr>
    <td>Gaji Total</td>
    <td>{{ $g->gapok + $tunjangan}}<input type="hidden" value="{{ $g->gapok + $tunjangan}}" name="total_gaji"></td>
</tr>
<tr>
    <td>Potongan</td>
    <td><input type="number" class="form-control" name="potongan" placeHolder="Potongan"></td>
</tr>
@endforeach
