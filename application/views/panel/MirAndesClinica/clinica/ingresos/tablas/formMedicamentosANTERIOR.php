
    <br><hr>
    <div class="col-lg-12" align="left" style=" margin-left: -15px">
        <label class="titulo">Datos Medicamentos</label>
    </div><br>
<table>
    <tr>
        <?php $via = explode('_',$evo->evoVia); ?>
        <th>Tpo.</th>
        <th>Medicamentos</th>
        <th>Vía</th>
        <th><input type="text" class="cuerpo2" name="evoVia0" value="<?php echo $via[0];?>"> </th>
        <th><input type="text" class="cuerpo2" name="evoVia1" value="<?php echo $via[1];?>"> </th>
        <th><input type="text" class="cuerpo2" name="evoVia2" value="<?php echo $via[2];?>"> </th>
        <th><input type="text" class="cuerpo2" name="evoVia3" value="<?php echo $via[3];?>"> </th>
        <th>
            <i id="more2" class="fa fa-plus-circle" aria-hidden="true" style=" cursor: pointer;color: red"></i>
            <input type="text" class="cuerpo2 more2" name="evoVia4" value="<?php echo $via[4];?>"> 
        </th>
        <th class="more2"><input type="text" class="cuerpo2" name="evoVia5" value="<?php echo $via[5];?>"> </th>
        <th class="more2"><input type="text" class="cuerpo2" name="evoVia6" value="<?php echo $via[6];?>"> </th>
        <th class="more2"><input type="text" class="cuerpo2" name="evoVia7" value="<?php echo $via[7];?>"> </th>
        <th class="more2"><input type="text" class="cuerpo2" name="evoVia8" value="<?php echo $via[8];?>"> </th>
        <th class="more2"><input type="text" class="cuerpo2" name="evoVia9" value="<?php echo $via[9];?>"> </th>
        <th class="more2"><input type="text" class="cuerpo2" name="evoVia10" value="<?php echo $via[10];?>"> </th>
        <th class="more2"><input type="text" class="cuerpo2" name="evoVia11" value="<?php echo $via[11];?>"> </th>
        <th class="more2"><input type="text" class="cuerpo2" name="evoVia12" value="<?php echo $via[12];?>"> </th>
        <th class="more2"><input type="text" class="cuerpo2" name="evoVia13" value="<?php echo $via[13];?>"> </th>
    </tr>
    <tr>
        <?php $med0 = explode('_',$evo->evoMed0); ?>
        <td>
            <input type="text" style="width:35px" name="evoMed00" value="<?php echo $med0[0];?>">
        </td>
        <td>
            <select name="evoMed01" >
                <option></option>
                <?php FOREACH($farmacos as $farm){ ?>
                <option value="<?php echo $farm->idfarmaco;?>" <?php IF($med0[1] === $farm->idfarmaco)echo 'selected';?>><?php echo $farm->descripcion;?></option>
                <?php } ?>
            </select>
        </td>
        
        <td>
            <input class="cuerpo2 via" type="text" name="evoMed02" id="evoMed02" value="<?php echo $med0[2];?>">
        </td>
        <td><input class="cuerpo2" type="text" name="evoMed03" value="<?php echo $med0[3];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed04" value="<?php echo $med0[4];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed05" value="<?php echo $med0[5];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed06" value="<?php echo $med0[6];?>"></td>

        <td class="more2"><input class="cuerpo2" type="text" name="evoMed07" value="<?php echo $med0[7];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed08" value="<?php echo $med0[8];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed09" value="<?php echo $med0[9];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed010" value="<?php echo $med0[10];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed011" value="<?php echo $med0[11];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed012" value="<?php echo $med0[12];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed013" value="<?php echo $med0[13];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed014" value="<?php echo $med0[14];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed015" value="<?php echo $med0[15];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed016" value="<?php echo $med0[16];?>"></td>
    </tr>
<?php $cantMedicamento = strlen($med0[7])+strlen($med0[8])+strlen($med0[9])+strlen($med0[10])+strlen($med0[11])+strlen($med0[12])+strlen($med0[13])+strlen($med0[14])+strlen($med0[15])+strlen($med0[16]);?>

    <tr>
       <?php $med0 = explode('_',$evo->evoMed1); ?>
        <td><input type="text" style="width:35px" name="evoMed10" value="<?php echo $med0[0];?>"></td>
        <td>
            <select name="evoMed11" >
                <option></option>
                <?php FOREACH($farmacos as $farm){ ?>
                <option value="<?php echo $farm->idfarmaco;?>" <?php IF($med0[1] === $farm->idfarmaco)echo 'selected';?>><?php echo $farm->descripcion;?></option>
                <?php } ?>
            </select>
        </td>

        <td><input class="cuerpo2" type="text" name="evoMed12" value="<?php echo $med0[2];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed13" value="<?php echo $med0[3];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed14" value="<?php echo $med0[4];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed15" value="<?php echo $med0[5];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed16" value="<?php echo $med0[6];?>"></td>

        <td class="more2"><input class="cuerpo2" type="text" name="evoMed17" value="<?php echo $med0[7];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed18" value="<?php echo $med0[8];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed19" value="<?php echo $med0[9];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed110" value="<?php echo $med0[10];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed111" value="<?php echo $med0[11];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed112" value="<?php echo $med0[12];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed113" value="<?php echo $med0[13];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed114" value="<?php echo $med0[14];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed115" value="<?php echo $med0[15];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed116" value="<?php echo $med0[16];?>"></td>
    </tr>
    <?php $cantMedicamento += strlen($med0[7])+strlen($med0[8])+strlen($med0[9])+strlen($med0[10])+strlen($med0[11])+strlen($med0[12])+strlen($med0[13])+strlen($med0[14])+strlen($med0[15])+strlen($med0[16]);?>

    <tr>
        <?php $med0 = explode('_',$evo->evoMed2); ?>
        <td><input type="text" style="width:35px" name="evoMed20" value="<?php echo $med0[0];?>"></td>
        <td>
            <select name="evoMed21" >
                <option></option>
                <?php FOREACH($farmacos as $farm){ ?>
                <option value="<?php echo $farm->idfarmaco;?>" <?php IF($med0[1] === $farm->idfarmaco)echo 'selected';?>><?php echo $farm->descripcion;?></option>
                <?php } ?>
            </select>
        </td>

        <td><input class="cuerpo2" type="text" name="evoMed22" value="<?php echo $med0[2];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed23" value="<?php echo $med0[3];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed24" value="<?php echo $med0[4];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed25" value="<?php echo $med0[5];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed26" value="<?php echo $med0[6];?>"></td>

        <td class="more2"><input class="cuerpo2" type="text" name="evoMed27" value="<?php echo $med0[7];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed28" value="<?php echo $med0[8];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed29" value="<?php echo $med0[9];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed210" value="<?php echo $med0[10];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed211" value="<?php echo $med0[11];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed212" value="<?php echo $med0[12];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed213" value="<?php echo $med0[13];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed214" value="<?php echo $med0[14];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed215" value="<?php echo $med0[15];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed216" value="<?php echo $med0[16];?>"></td>
    
    </tr>
    <?php $cantMedicamento += strlen($med0[7])+strlen($med0[8])+strlen($med0[9])+strlen($med0[10])+strlen($med0[11])+strlen($med0[12])+strlen($med0[13])+strlen($med0[14])+strlen($med0[15])+strlen($med0[16]);?>

    <tr>
        <?php $med0 = explode('_',$evo->evoMed3); ?>
        <td><input type="text" style="width:35px" name="evoMed30" value="<?php echo $med0[0];?>"></td>
        <td>
            <select name="evoMed31" >
                <option></option>
                <?php FOREACH($farmacos as $farm){ ?>
                <option value="<?php echo $farm->idfarmaco;?>" <?php IF($med0[1] === $farm->idfarmaco)echo 'selected';?>><?php echo $farm->descripcion;?></option>
                <?php } ?>
            </select>
        </td>

        <td><input class="cuerpo2" type="text" name="evoMed32" value="<?php echo $med0[2];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed33" value="<?php echo $med0[3];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed34" value="<?php echo $med0[4];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed35" value="<?php echo $med0[5];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed36" value="<?php echo $med0[6];?>"></td>

        <td class="more2"><input class="cuerpo2" type="text" name="evoMed37" value="<?php echo $med0[7];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed38" value="<?php echo $med0[8];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed39" value="<?php echo $med0[9];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed310" value="<?php echo $med0[10];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed311" value="<?php echo $med0[11];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed312" value="<?php echo $med0[12];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed313" value="<?php echo $med0[13];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed314" value="<?php echo $med0[14];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed315" value="<?php echo $med0[15];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed316" value="<?php echo $med0[16];?>"></td>
    
    </tr>
    <?php $cantMedicamento += strlen($med0[7])+strlen($med0[8])+strlen($med0[9])+strlen($med0[10])+strlen($med0[11])+strlen($med0[12])+strlen($med0[13])+strlen($med0[14])+strlen($med0[15])+strlen($med0[16]);?>

    <tr>
        <?php $med0 = explode('_',$evo->evoMed4); ?>
        <td><input type="text" style="width:35px" name="evoMed40" value="<?php echo $med0[0];?>"></td>
        <td>
            <select name="evoMed41" >
                <option></option>
                <?php FOREACH($farmacos as $farm){ ?>
                <option value="<?php echo $farm->idfarmaco;?>" <?php IF($med0[1] === $farm->idfarmaco)echo 'selected';?>><?php echo $farm->descripcion;?></option>
                <?php } ?>
            </select>
        </td>

        <td><input class="cuerpo2" type="text" name="evoMed42" value="<?php echo $med0[2];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed43" value="<?php echo $med0[3];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed44" value="<?php echo $med0[4];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed45" value="<?php echo $med0[5];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed46" value="<?php echo $med0[6];?>"></td>

        <td class="more2"><input class="cuerpo2" type="text" name="evoMed47" value="<?php echo $med0[7];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed48" value="<?php echo $med0[8];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed49" value="<?php echo $med0[9];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed410" value="<?php echo $med0[10];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed411" value="<?php echo $med0[11];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed412" value="<?php echo $med0[12];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed413" value="<?php echo $med0[13];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed414" value="<?php echo $med0[14];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed415" value="<?php echo $med0[15];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed416" value="<?php echo $med0[16];?>"></td>
    
    </tr>
    
    
    
    
    <tr>
        <?php $med0 = explode('_',$evo->evoMed5); ?>
        <td><input type="text" style="width:35px" name="evoMed50" value="<?php echo $med0[0];?>"></td>
        <td>
            <select name="evoMed51" >
                <option></option>
                <?php FOREACH($farmacos as $farm){ ?>
                <option value="<?php echo $farm->idfarmaco;?>" <?php IF($med0[1] === $farm->idfarmaco)echo 'selected';?>><?php echo $farm->descripcion;?></option>
                <?php } ?>
            </select>
        </td>

        <td><input class="cuerpo2" type="text" name="evoMed52" value="<?php echo $med0[2];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed53" value="<?php echo $med0[3];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed54" value="<?php echo $med0[4];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed55" value="<?php echo $med0[5];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed56" value="<?php echo $med0[6];?>"></td>

        <td class="more2"><input class="cuerpo2" type="text" name="evoMed57" value="<?php echo $med0[7];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed58" value="<?php echo $med0[8];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed59" value="<?php echo $med0[9];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed510" value="<?php echo $med0[10];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed511" value="<?php echo $med0[11];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed512" value="<?php echo $med0[12];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed513" value="<?php echo $med0[13];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed514" value="<?php echo $med0[14];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed515" value="<?php echo $med0[15];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed516" value="<?php echo $med0[16];?>"></td>
    
    </tr>
    <tr>
        <?php $med0 = explode('_',$evo->evoMed6); ?>
        <td><input type="text" style="width:35px" name="evoMed60" value="<?php echo $med0[0];?>"></td>
        <td>
            <select name="evoMed61" >
                <option></option>
                <?php FOREACH($farmacos as $farm){ ?>
                <option value="<?php echo $farm->idfarmaco;?>" <?php IF($med0[1] === $farm->idfarmaco)echo 'selected';?>><?php echo $farm->descripcion;?></option>
                <?php } ?>
            </select>
        </td>

        <td><input class="cuerpo2" type="text" name="evoMed62" value="<?php echo $med0[2];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed63" value="<?php echo $med0[3];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed64" value="<?php echo $med0[4];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed65" value="<?php echo $med0[5];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed66" value="<?php echo $med0[6];?>"></td>

        <td class="more2"><input class="cuerpo2" type="text" name="evoMed67" value="<?php echo $med0[7];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed68" value="<?php echo $med0[8];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed69" value="<?php echo $med0[9];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed610" value="<?php echo $med0[10];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed611" value="<?php echo $med0[11];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed612" value="<?php echo $med0[12];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed613" value="<?php echo $med0[13];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed614" value="<?php echo $med0[14];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed615" value="<?php echo $med0[15];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed616" value="<?php echo $med0[16];?>"></td>
    
    </tr>
    <tr>
        <?php $med0 = explode('_',$evo->evoMed7); ?>
        <td><input type="text" style="width:35px" name="evoMed70" value="<?php echo $med0[0];?>"></td>
        <td>
            <select name="evoMed71" >
                <option></option>
                <?php FOREACH($farmacos as $farm){ ?>
                <option value="<?php echo $farm->idfarmaco;?>" <?php IF($med0[1] === $farm->idfarmaco)echo 'selected';?>><?php echo $farm->descripcion;?></option>
                <?php } ?>
            </select>
        </td>

        <td><input class="cuerpo2" type="text" name="evoMed72" value="<?php echo $med0[2];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed73" value="<?php echo $med0[3];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed74" value="<?php echo $med0[4];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed75" value="<?php echo $med0[5];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed76" value="<?php echo $med0[6];?>"></td>

        <td class="more2"><input class="cuerpo2" type="text" name="evoMed77" value="<?php echo $med0[7];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed78" value="<?php echo $med0[8];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed79" value="<?php echo $med0[9];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed710" value="<?php echo $med0[10];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed711" value="<?php echo $med0[11];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed712" value="<?php echo $med0[12];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed713" value="<?php echo $med0[13];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed714" value="<?php echo $med0[14];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed715" value="<?php echo $med0[15];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed716" value="<?php echo $med0[16];?>"></td>
    
    </tr>
    <tr>
        <?php $med0 = explode('_',$evo->evoMed8); ?>
        <td><input type="text" style="width:35px" name="evoMed80" value="<?php echo $med0[0];?>"></td>
        <td>
            <select name="evoMed81" >
                <option></option>
                <?php FOREACH($farmacos as $farm){ ?>
                <option value="<?php echo $farm->idfarmaco;?>" <?php IF($med0[1] === $farm->idfarmaco)echo 'selected';?>><?php echo $farm->descripcion;?></option>
                <?php } ?>
            </select>
        </td>

        <td><input class="cuerpo2" type="text" name="evoMed82" value="<?php echo $med0[2];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed83" value="<?php echo $med0[3];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed84" value="<?php echo $med0[4];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed85" value="<?php echo $med0[5];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed86" value="<?php echo $med0[6];?>"></td>

        <td class="more2"><input class="cuerpo2" type="text" name="evoMed87" value="<?php echo $med0[7];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed88" value="<?php echo $med0[8];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed89" value="<?php echo $med0[9];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed810" value="<?php echo $med0[10];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed811" value="<?php echo $med0[11];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed812" value="<?php echo $med0[12];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed813" value="<?php echo $med0[13];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed814" value="<?php echo $med0[14];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed815" value="<?php echo $med0[15];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed816" value="<?php echo $med0[16];?>"></td>
    
    </tr>
    <tr>
        <?php $med0 = explode('_',$evo->evoMed9); ?>
        <td><input type="text" style="width:35px" name="evoMed90" value="<?php echo $med0[0];?>"></td>
        <td>
            <select name="evoMed91" >
                <option></option>
                <?php FOREACH($farmacos as $farm){ ?>
                <option value="<?php echo $farm->idfarmaco;?>" <?php IF($med0[1] === $farm->idfarmaco)echo 'selected';?>><?php echo $farm->descripcion;?></option>
                <?php } ?>
            </select>
        </td>

        <td><input class="cuerpo2" type="text" name="evoMed92" value="<?php echo $med0[2];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed93" value="<?php echo $med0[3];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed94" value="<?php echo $med0[4];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed95" value="<?php echo $med0[5];?>"></td>
        <td><input class="cuerpo2" type="text" name="evoMed96" value="<?php echo $med0[6];?>"></td>

        <td class="more2"><input class="cuerpo2" type="text" name="evoMed97" value="<?php echo $med0[7];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed98" value="<?php echo $med0[8];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed99" value="<?php echo $med0[9];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed910" value="<?php echo $med0[10];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed911" value="<?php echo $med0[11];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed912" value="<?php echo $med0[12];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed913" value="<?php echo $med0[13];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed914" value="<?php echo $med0[14];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed915" value="<?php echo $med0[15];?>"></td>
        <td class="more2"><input class="cuerpo2" type="text" name="evoMed916" value="<?php echo $med0[16];?>"></td>
    
    </tr>
    <?php $cantMedicamento += strlen($med0[7])+strlen($med0[8])+strlen($med0[9])+strlen($med0[10])+strlen($med0[11])+strlen($med0[12])+strlen($med0[13])+strlen($med0[14])+strlen($med0[15])+strlen($med0[16]);?>

</table><hr>

<input value="<?php echo $cantMedicamento;?>" id="cantMedicamento" type="hidden">

<script>
    //////VALIDACIONES DE TECLAS//////
        $(".via").keyup(function () {
            
            var letra = $('input:text[name=evoMed02]').val()
            
            $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>" + "api/clinica/via/" + letra,
                dataType: 'json',

                success: function(data){
                    }
            })
        });
</script>
