<?php
//include_once $_SERVER['DOCUMENT_ROOT']."/capacitacion/lib/funciones.php";
include_once('../../../lib/funciones.php');

/**
 * @property  Documentoperitaje
 */
class ParamInfoPeritaje
{
    function  ParamInfoPeritaje($rutsinformato,  $dvPaciente, $numeroLicencia,$archivopdf,$tipo)
    {
        
		$this->RutCotizante=(integer)$rutsinformato;
		$this->DvRutCotizante = (string)  $dvPaciente;
        $this->FolioLicencia = (integer)$numeroLicencia;
		$this->DocumentoPeritaje=$archivopdf ;
		$this->ExtensionDocumento='PDF';
        $this->TipoDocumento=$tipo;
		$this->NroCorrLic= 0 ;
    }


}
function anulaenvio($id,$conectar){

    mysql_query("UPDATE	horas SET fechaEnvioXML=NULL WHERE id=$id", $conectar);
    mysql_query("UPDATE	informe_entrevista SET fechaEnvioXML=NULL WHERE hora =$id", $conectar);

}




?>