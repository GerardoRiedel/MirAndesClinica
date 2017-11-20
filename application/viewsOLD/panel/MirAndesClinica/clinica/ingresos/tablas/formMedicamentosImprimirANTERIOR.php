<?php $via = explode('_',$evo->evoVia); ?>
<table>
    <tr>
        <th style=" border:1px solid black">Tpo.</th>
        <th style=" border:1px solid black" align="left">Medicamentos</th>
        <th style=" border:1px solid black" align="left">Vía</th>
        <th style=" border:1px solid black" ><input type="text" style="width:35px" value="<?php echo $via[0];?>"> </th>
        <th style=" border:1px solid black" ><input type="text" style="width:35px" value="<?php echo $via[1];?>"> </th>
        <th style=" border:1px solid black" ><input type="text" style="width:35px" value="<?php echo $via[2];?>"> </th>
        <th style=" border:1px solid black" ><input type="text" style="width:35px" value="<?php echo $via[3];?>"> </th>
        <th style=" border:1px solid black" ><input type="text" style="width:35px" value="<?php echo $via[4];?>"> </th>
        <th style=" border:1px solid black" ><input type="text" style="width:35px" value="<?php echo $via[5];?>"> </th>
        <th style=" border:1px solid black" ><input type="text" style="width:35px" value="<?php echo $via[6];?>"> </th>
        <th style=" border:1px solid black" ><input type="text" style="width:35px" value="<?php echo $via[7];?>"> </th>
        <th style=" border:1px solid black" ><input type="text" style="width:35px" value="<?php echo $via[8];?>"> </th>
        <th style=" border:1px solid black" ><input type="text" style="width:35px" value="<?php echo $via[9];?>"> </th>
        <th style=" border:1px solid black" ><input type="text" style="width:35px" value="<?php echo $via[10];?>"> </th>
        <th style=" border:1px solid black" ><input type="text" style="width:35px" value="<?php echo $via[11];?>"> </th>
        <th style=" border:1px solid black" ><input type="text" style="width:35px" value="<?php echo $via[12];?>"> </th>
        <th style=" border:1px solid black" ><input type="text" style="width:35px" value="<?php echo $via[13];?>"> </th>
    
    </tr>
    <tr>
        <?php $med0 = explode('_',$evo->evoMed0); ?>
        <td class="td8"><input type="text" style="width:35px" value="<?php echo $med0[0];?>"></td>
        <td class="td8">
            <?php $farmac = '';?>
            <?php FOREACH($farmacos as $farm){ ?>
                <?php IF($med0[1] === $farm->idfarmaco)$farmac  = $farm->descripcion;?></option>
                <?php } ?>
            <input type="text" value="<?php echo $farmac;?>"></td>

        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[2];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[3];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[4];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[5];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[6];?>"></td>
 
        <td class="td8"><input class="cuerpo2" type="text" alue="<?php echo $med0[7];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" alue="<?php echo $med0[8];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" alue="<?php echo $med0[9];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[10];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[11];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[12];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[13];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[14];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[15];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[16];?>"></td>
    </tr>

    <tr>
       <?php $med0 = explode('_',$evo->evoMed1); ?>
        <td class="td8"><input type="text" style="width:35px" name="evoMed10" value="<?php echo $med0[0];?>"></td>
        <td class="td8">
            <?php $farmac = '';?>
            <?php FOREACH($farmacos as $farm){ ?>
                <?php IF($med0[1] === $farm->idfarmaco)$farmac  = $farm->descripcion;?></option>
                <?php } ?>
            <input type="text" value="<?php echo $farmac;?>">
        </td>

        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[2];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[3];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[4];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[5];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[6];?>"></td>
 
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[7];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[8];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[9];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[10];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[11];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[12];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[13];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[14];?>"></td> 
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[15];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[16];?>"></td>
    </tr>
    <tr>
        <?php $med0 = explode('_',$evo->evoMed2); ?>
        <td class="td8"><input type="text" style="width:35px" name="evoMed20" value="<?php echo $med0[0];?>"></td>
        <td class="td8">
            <?php $farmac = '';?>
            <?php FOREACH($farmacos as $farm){ ?>
                <?php IF($med0[1] === $farm->idfarmaco)$farmac  = $farm->descripcion;?></option>
                <?php } ?>
            <input type="text" value="<?php echo $farmac;?>">
        </td>

        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[2];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[3];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[4];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[5];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[6];?>"></td>

        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[7];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[8];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[9];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[10];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[11];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[12];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[13];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[14];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[15];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[16];?>"></td>
    
    </tr>
    <tr>
        <?php $med0 = explode('_',$evo->evoMed3); ?>
        <td class="td8"><input type="text" style="width:35px" name="evoMed30" value="<?php echo $med0[0];?>"></td>
        <td class="td8">
            <?php $farmac = '';?>
            <?php FOREACH($farmacos as $farm){ ?>
                <?php IF($med0[1] === $farm->idfarmaco)$farmac  = $farm->descripcion;?></option>
                <?php } ?>
            <input type="text" value="<?php echo $farmac;?>">
        </td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[2];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[3];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[4];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[5];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[6];?>"></td>
 
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[7];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[8];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[9];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[10];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[11];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[12];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[13];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[14];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[15];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[16];?>"></td>
    
    </tr>
    <tr>
        <?php $med0 = explode('_',$evo->evoMed4); ?>
        <td class="td8"><input type="text" style="width:35px" name="evoMed40" value="<?php echo $med0[0];?>"></td>
        <td class="td8">
            <?php $farmac = '';?>
            <?php FOREACH($farmacos as $farm){ ?>
                <?php IF($med0[1] === $farm->idfarmaco)$farmac  = $farm->descripcion;?></option>
                <?php } ?>
            <input type="text" value="<?php echo $farmac;?>">
        </td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[2];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[3];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[4];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[5];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[6];?>"></td>

        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[7];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[8];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[9];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[10];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[11];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[12];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[13];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[14];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[15];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[16];?>"></td>
    
    </tr>
    
    
    
    
    
    <tr>
        <?php $med0 = explode('_',$evo->evoMed5); ?>
        <td class="td8"><input type="text" style="width:35px" name="evoMed50" value="<?php echo $med0[0];?>"></td>
        <td class="td8">
            <?php $farmac = '';?>
            <?php FOREACH($farmacos as $farm){ ?>
                <?php IF($med0[1] === $farm->idfarmaco)$farmac  = $farm->descripcion;?></option>
                <?php } ?>
            <input type="text" value="<?php echo $farmac;?>">
        </td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[2];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[3];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[4];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[5];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[6];?>"></td>

        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[7];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[8];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[9];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[10];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[11];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[12];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[13];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[14];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[15];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[16];?>"></td>
    
    </tr>
    <tr>
        <?php $med0 = explode('_',$evo->evoMed6); ?>
        <td class="td8"><input type="text" style="width:35px" name="evoMed60" value="<?php echo $med0[0];?>"></td>
        <td class="td8">
            <?php $farmac = '';?>
            <?php FOREACH($farmacos as $farm){ ?>
                <?php IF($med0[1] === $farm->idfarmaco)$farmac  = $farm->descripcion;?></option>
                <?php } ?>
            <input type="text" value="<?php echo $farmac;?>">
        </td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[2];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[3];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[4];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[5];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[6];?>"></td>

        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[7];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[8];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[9];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[10];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[11];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[12];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[13];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[14];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[15];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[16];?>"></td>
    
    </tr>
    <tr>
        <?php $med0 = explode('_',$evo->evoMed7); ?>
        <td class="td8"><input type="text" style="width:35px" name="evoMed70" value="<?php echo $med0[0];?>"></td>
        <td class="td8">
            <?php $farmac = '';?>
            <?php FOREACH($farmacos as $farm){ ?>
                <?php IF($med0[1] === $farm->idfarmaco)$farmac  = $farm->descripcion;?></option>
                <?php } ?>
            <input type="text" value="<?php echo $farmac;?>">
        </td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[2];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[3];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[4];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[5];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[6];?>"></td>

        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[7];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[8];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[9];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[10];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[11];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[12];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[13];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[14];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[15];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[16];?>"></td>
    
    </tr>
    <tr>
        <?php $med0 = explode('_',$evo->evoMed8); ?>
        <td class="td8"><input type="text" style="width:35px" name="evoMed80" value="<?php echo $med0[0];?>"></td>
        <td class="td8">
            <?php $farmac = '';?>
            <?php FOREACH($farmacos as $farm){ ?>
                <?php IF($med0[1] === $farm->idfarmaco)$farmac  = $farm->descripcion;?></option>
                <?php } ?>
            <input type="text" value="<?php echo $farmac;?>">
        </td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[2];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[3];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[4];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[5];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[6];?>"></td>

        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[7];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[8];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[9];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[10];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[11];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[12];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[13];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[14];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[15];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[16];?>"></td>
    
    </tr>
    <tr>
        <?php $med0 = explode('_',$evo->evoMed9); ?>
        <td class="td8"><input type="text" style="width:35px" name="evoMed90" value="<?php echo $med0[0];?>"></td>
        <td class="td8">
            <?php $farmac = '';?>
            <?php FOREACH($farmacos as $farm){ ?>
                <?php IF($med0[1] === $farm->idfarmaco)$farmac  = $farm->descripcion;?></option>
                <?php } ?>
            <input type="text" value="<?php echo $farmac;?>">
        </td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[2];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[3];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[4];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[5];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[6];?>"></td>

        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[7];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[8];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[9];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[10];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[11];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[12];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[13];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[14];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[15];?>"></td>
        <td class="td8"><input class="cuerpo2" type="text" value="<?php echo $med0[16];?>"></td>
    
    </tr>
    
    
    
    
    
    
</table>