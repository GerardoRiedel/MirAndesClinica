<div align="center">

<div class="col-lg-12" align="left">
        <label class="titulo">Datos Evolución Diaria</label>
</div>    
<br>
    
    <?php IF($verEvo===1)$evo='';
    $evolucion = explode('_',$evo->evoHoras); 
    ?>
    <!--<div class="col-lg-2" align="left">
                    <label>HORA</label>
                        <br><input type="time" name="evoHor0" value="<?php IF($evolucion[0] !== '00:00:00')echo $evolucion[0]; ?>" >
                        <br><input type="time" name="evoHor1" value="<?php IF($evolucion[1] !== '00:00:00')echo $evolucion[1]; ?>" >
                        <br><input type="time" name="evoHor2" value="<?php IF($evolucion[2] !== '00:00:00')echo $evolucion[2]; ?>" >
                        <br><input type="time" name="evoHor3" value="<?php IF($evolucion[3] !== '00:00:00')echo $evolucion[3]; ?>" >
                        <br><input type="time" name="evoHor4" value="<?php IF($evolucion[4] !== '00:00:00')echo $evolucion[4]; ?>" >
                        <br><input type="time" name="evoHor5" value="<?php IF($evolucion[5] !== '00:00:00')echo $evolucion[5]; ?>" >
                        <br><input type="time" name="evoHor6" value="<?php IF($evolucion[6] !== '00:00:00')echo $evolucion[6]; ?>" >
                        <br><input type="time" name="evoHor7" value="<?php IF($evolucion[7] !== '00:00:00')echo $evolucion[7]; ?>" >
                    </div>
    -->
                    <div class="col-lg-12" >
                        <label>EVOLUCIÓN DÍA</label>
                        <br><textarea name="evoDia" id="evoDia" style="height: 210px;width: 100%;line-height: 25px" placeholder="Ingrese aquí la evolución del día"><?php echo $evo->evoDia; ?></textarea>
                    </div>
                    
    <div class="col-lg-12"><br><br></div>
    <div class="col-lg-12"></div>    
    <!--
                    <div class="col-lg-2"  align="left">
                        <label>HORA</label>
                        <br><input type="time" name="evoHor10" value="<?php IF($evolucion[8] !== '00:00:00')echo $evolucion[8]; ?>" >
                        <br><input type="time" name="evoHor11" value="<?php IF($evolucion[9] !== '00:00:00')echo $evolucion[9]; ?>" >
                        <br><input type="time" name="evoHor12" value="<?php IF($evolucion[10] !== '00:00:00')echo $evolucion[10]; ?>" >
                        <br><input type="time" name="evoHor13" value="<?php IF($evolucion[11] !== '00:00:00')echo $evolucion[11]; ?>" >
                        <br><input type="time" name="evoHor14" value="<?php IF($evolucion[12] !== '00:00:00')echo $evolucion[12]; ?>" >
                        <br><input type="time" name="evoHor15" value="<?php IF($evolucion[13] !== '00:00:00')echo $evolucion[13]; ?>" >
                        <br><input type="time" name="evoHor16" value="<?php IF($evolucion[14] !== '00:00:00')echo $evolucion[14]; ?>" >
                        <br><input type="time" name="evoHor17" value="<?php IF($evolucion[15] !== '00:00:00')echo $evolucion[15]; ?>" >
                    </div>
    -->
                    <div class="col-lg-12" >
                        <label>EVOLUCIÓN NOCHE</label>
                        <br><textarea name="evoNoche" id="evoNoche" style="height: 210px;width: 100%;line-height: 25px" placeholder="Ingrese aquí la evolución de la noche"><?php echo $evo->evoNoche; ?></textarea>
                    </div>
 
</div>