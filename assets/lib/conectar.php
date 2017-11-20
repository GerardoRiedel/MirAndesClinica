<?php
function conectar()
{
   if (!($link=mysql_connect("10.0.0.155","cetepcl","rootsecurity626")))
   {
      echo "Error al conectar a la base de datos";
      exit();
   }
   if (!mysql_select_db("cetepcl_agenda",$link))
   {
      echo "Error al seleccionar la base de datos.";
      exit();
   }
   return $link;
}
?>