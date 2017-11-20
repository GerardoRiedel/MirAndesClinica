
<?php 
IF(!empty($enfermeria)){
    $cog         = explode('_', $enfermeria->enfCognitiva);
    $apariencia  = $enfermeria->enfApariencia;
    $conciencia  = $enfermeria->enfConciencia;
    $actitud     = $enfermeria->enfActitud;
    $conducta    = $enfermeria->enfConducta;
    $afectividad = $enfermeria->enfAfectividad;
    $animo       = $enfermeria->enfAnimo;
    $lenguaje    = $enfermeria->enfLenguaje;
    $est         = explode('_', $enfermeria->enfEstPensamiento);
    //$con         = explode('_', $enfermeria->enfConPensamiento);
    $juicio      = $enfermeria->enfJuicio;
}
?>
<div style="width: 95%" align="center">
<div class="col-lg-2" align="left">
    APARIENCIA
</div>
<div class="col-lg-9" align="left">
    <table style="border:none">
        <tr>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfApariencia" value="1" <?php IF(!empty($apariencia)&& $apariencia === '1')echo 'checked';?>> Adecuada </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfApariencia" value="2" <?php IF(!empty($apariencia)&& $apariencia === '2')echo 'checked';?>> Desaseado </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfApariencia" value="3" <?php IF(!empty($apariencia)&& $apariencia === '3')echo 'checked';?>> Desgreñado </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfApariencia" value="4" <?php IF(!empty($apariencia)&& $apariencia === '4')echo 'checked';?>> Inapropiado </td>
        </tr>
    </table>
</div>
<div class="col-lg-12"><br></div>
<div class="col-lg-2" align="left">
    ESTADO CONCIENCIA
</div>
<div class="col-lg-9" align="left">
    <table style="border:none">
        <tr>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfConciencia" value="1" <?php IF(!empty($conciencia)&& $conciencia === '1')echo 'checked';?>> Vigil </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfConciencia" value="2" <?php IF(!empty($conciencia)&& $conciencia === '2')echo 'checked';?>> Lúcido </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfConciencia" value="3" <?php IF(!empty($conciencia)&& $conciencia === '3')echo 'checked';?>> Somnoliento </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfConciencia" value="4" <?php IF(!empty($conciencia)&& $conciencia === '4')echo 'checked';?>> Sopor </td>
            <td align="left" style="border:none; width:100px"> <input type="radio" name="enfConciencia" value="5" <?php IF(!empty($conciencia)&& $conciencia === '5')echo 'checked';?>> Coma </td>
        </tr>
    </table>
</div>
<div class="col-lg-12"><br></div>
<div class="col-lg-2" align="left">
    ACTITUD Y CONCIENCIA
</div>
<div class="col-lg-9" align="left">
    <table style="border:none">
        <tr>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfActitud" value="1" <?php IF(!empty($actitud)&& $actitud === '1')echo 'checked';?>> Cooperador </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfActitud" value="2" <?php IF(!empty($actitud)&& $actitud === '2')echo 'checked';?>> No cooperador </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfActitud" value="3" <?php IF(!empty($actitud)&& $actitud === '3')echo 'checked';?>> Amistoso </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfActitud" value="4" <?php IF(!empty($actitud)&& $actitud === '4')echo 'checked';?>> Suspicaz </td>
            <td align="left" style="border:none; width:100px"> <input type="radio" name="enfActitud" value="5" <?php IF(!empty($actitud)&& $actitud === '5')echo 'checked';?>> Hostil </td>
            <td align="left" style="border:none; width:100px"> <input type="radio" name="enfActitud" value="6" <?php IF(!empty($actitud)&& $actitud === '6')echo 'checked';?>> Indiferente </td>
        </tr>
    </table>
</div>
<div class="col-lg-12"><br></div>
<div class="col-lg-2" align="left">
    CONDUCTA MOTORA
</div>
<div class="col-lg-9" align="left">
    <table style="border:none">
        <tr>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfConducta" value="1" <?php IF(!empty($conducta)&& $conducta === '1')echo 'checked';?>> Sin alteración </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfConducta" value="2" <?php IF(!empty($conducta)&& $conducta === '2')echo 'checked';?>> Enlentecido </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfConducta" value="3" <?php IF(!empty($conducta)&& $conducta === '3')echo 'checked';?>> Inquieto </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfConducta" value="4" <?php IF(!empty($conducta)&& $conducta === '4')echo 'checked';?>> Agitado </td>
        </tr>
    </table>
</div>
<div class="col-lg-12"><br></div>
<div class="col-lg-12" align="left">
    <label class="titulo">AREA COGNITIVA</label> <b>(<input type="checkbox"> Intacta <input type="checkbox" checked> Disminuida)</b>
</div>
<div class="col-lg-2" align="left">
    
</div>
<div class="col-lg-9" align="left">
    <table style="border:none">
        <tr>
            <td align="left" style="border:none; width:130px"> <input type="checkbox" name="enfCog0" value="1" <?php IF(!empty($cog)&& $cog[0] === '1')echo 'checked';?>> Concentración </td>
            <td align="left" style="border:none; width:130px"> <input type="checkbox" name="enfCog1" value="1" <?php IF(!empty($cog)&& $cog[1] === '1')echo 'checked';?>> Atención </td>
            <td align="left" style="border:none; width:190px"> <input type="checkbox" name="enfCog2" value="1" <?php IF(!empty($cog)&& $cog[2] === '1')echo 'checked';?>> Orientación Temporal </td>
            <td align="left" style="border:none; width:190px"> <input type="checkbox" name="enfCog3" value="1" <?php IF(!empty($cog)&& $cog[3] === '1')echo 'checked';?>> Orientación Espacial </td>
        </tr>
        <tr>
            <td align="left" style="border:none;"> <input type="checkbox" name="enfCog4" value="1" <?php IF(!empty($cog)&& $cog[4] === '1')echo 'checked';?>> Memoria </td>
            <td align="left" style="border:none;"> <input type="checkbox" name="enfCog5" value="1" <?php IF(!empty($cog)&& $cog[5] === '1')echo 'checked';?>> Inteligencia </td>
            <td align="left" style="border:none;"> <input type="checkbox" name="enfCog6" value="1" <?php IF(!empty($cog)&& $cog[6] === '1')echo 'checked';?>> Sin alteración </td>
            <td align="left" style="border:none;"> <input type="checkbox" name="enfCog7" value="1" <?php IF(!empty($cog)&& $cog[7] === '1')echo 'checked';?>> No evaluable </td>
        </tr>
    </table>
</div>
<div class="col-lg-12"><br></div>
<div class="col-lg-2" align="left">
    AFECTIVIDAD
</div>
<div class="col-lg-9" align="left">
    <table style="border:none">
        <tr>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfAfectividad" value="1" <?php IF(!empty($afectividad)&& $afectividad === '1')echo 'checked';?>> Concordante </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfAfectividad" value="2" <?php IF(!empty($afectividad)&& $afectividad === '2')echo 'checked';?>> Discordante </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfAfectividad" value="3" <?php IF(!empty($afectividad)&& $afectividad === '3')echo 'checked';?>> Aplanado </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfAfectividad" value="4" <?php IF(!empty($afectividad)&& $afectividad === '4')echo 'checked';?>> Expansivo </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfAfectividad" value="5" <?php IF(!empty($afectividad)&& $afectividad === '5')echo 'checked';?>> Lábil </td>
        </tr>
    </table>
</div>
<div class="col-lg-12"><br></div>
<div class="col-lg-2" align="left">
    ANIMO
</div>
<div class="col-lg-9" align="left">
    <table style="border:none">
        <tr>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfAnimo" value="1" <?php IF(!empty($animo)&& $animo === '1')echo 'checked';?>> Eutímico </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfAnimo" value="2" <?php IF(!empty($animo)&& $animo === '2')echo 'checked';?>> Triste </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfAnimo" value="3" <?php IF(!empty($animo)&& $animo === '3')echo 'checked';?>> Irritable </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfAnimo" value="4" <?php IF(!empty($animo)&& $animo === '4')echo 'checked';?>> Eufórico </td>
        </tr>
    </table>
</div>
<div class="col-lg-12"><br></div>
<div class="col-lg-2" align="left">
    LENGUAJE
</div>
<div class="col-lg-9" align="left">
    <table style="border:none">
        <tr>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfLenguaje" value="1" <?php IF(!empty($lenguaje)&& $lenguaje === '1')echo 'checked';?>> Espontáneo </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfLenguaje" value="2" <?php IF(!empty($lenguaje)&& $lenguaje === '2')echo 'checked';?>> Fluido </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfLenguaje" value="3" <?php IF(!empty($lenguaje)&& $lenguaje === '3')echo 'checked';?>> Disártrico </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfLenguaje" value="4" <?php IF(!empty($lenguaje)&& $lenguaje === '4')echo 'checked';?>> Incomprensible </td>
            <td align="left" style="border:none; width:130px"> <input type="radio" name="enfLenguaje" value="5" <?php IF(!empty($lenguaje)&& $lenguaje === '5')echo 'checked';?>> Verborreico </td>
        </tr>
    </table>
</div>
<div class="col-lg-12"></div>
<div class="col-lg-12"><br></div>
<div class="col-lg-12" align="left">
    <label class="titulo">ESTRUCTURA DEL PENSAMIENTO</label> 
</div>
<div class="col-lg-2" align="left">
    
</div>
<div class="col-lg-9" align="left">
    <table style="border:none">
        <tr>
            <td align="left" style="border:none; width:130px"> <input type="checkbox" name="enfEst0" value="1" <?php IF(!empty($est)&& $est[0] === '1')echo 'checked';?>> Coherente </td>
            <td align="left" style="border:none; width:130px"> <input type="checkbox" name="enfEst1" value="1" <?php IF(!empty($est)&& $est[1] === '1')echo 'checked';?>> Incoherente </td>
            <td align="left" style="border:none; width:130px"> <input type="checkbox" name="enfEst2" value="1" <?php IF(!empty($est)&& $est[2] === '1')echo 'checked';?>> Disgregado </td>
            <td align="left" style="border:none; width:130px"> <input type="checkbox" name="enfEst3" value="1" <?php IF(!empty($est)&& $est[3] === '1')echo 'checked';?>> Confuso </td>
        </tr>
        <tr>
            <td align="left" style="border:none; width:130px"> <input type="checkbox" name="enfEst4" value="1" <?php IF(!empty($est)&& $est[4] === '1')echo 'checked';?>> Tangencial </td>
            <td align="left" style="border:none; width:130px"> <input type="checkbox" name="enfEst5" value="1" <?php IF(!empty($est)&& $est[5] === '1')echo 'checked';?>> Circunstancial </td>
            <td align="left" style="border:none; width:130px"> <input type="checkbox" name="enfEst6" value="1" <?php IF(!empty($est)&& $est[6] === '1')echo 'checked';?>> Ideofugal </td>
            <td align="left" style="border:none; width:130px"> <input type="checkbox" name="enfEst7" value="1" <?php IF(!empty($est)&& $est[7] === '1')echo 'checked';?>> Confabulaciones </td>
        </tr>
        <tr>
            <td align="left" style="border:none; width:130px"> <input type="checkbox" name="enfEst8" value="1" <?php IF(!empty($est)&& $est[8] === '1')echo 'checked';?>> Escamoteador </td>
        </tr>
    </table>
</div>
<div class="col-lg-12"><br></div>






<div class="col-lg-2" align="left">
    JUICIO
</div>
<div class="col-lg-9" align="left">
    <table style="border:none">
        <tr>
            <td align="left" style="border:none; width:300px"> <input type="radio" name="enfJuicio" value="1" <?php IF(!empty($juicio)&& $juicio === '1')echo 'checked';?>> Sin conciencia de enfermedad </td>
            <td align="left" style="border:none; width:300px"> <input type="radio" name="enfJuicio" value="2" <?php IF(!empty($juicio)&& $juicio === '2')echo 'checked';?>> Conciencia Parcial </td>
            <td align="left" style="border:none; width:300px"> <input type="radio" name="enfJuicio" value="3" <?php IF(!empty($juicio)&& $juicio === '3')echo 'checked';?>> Conciencia Adecuada </td>
        </tr>
    </table>
</div>
<div class="col-lg-12" style="height: 200px"></div>



</div>


