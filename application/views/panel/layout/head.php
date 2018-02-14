
<!DOCTYPE html>
<html lang="es" xml:lang="es">
<head>

    <title>Cetep :: <?php echo $title;?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/font-awesome.css" />
    
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/colorpicker.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/datepicker.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/icheck/flat/blue.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/select2.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/jquery-ui.css" />
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/hs_admin.css" />
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/hs_admin2.css" />
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/sprite.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/jquery.gritter.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/component.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/export.css" />
    <link rel="shortcut icon" href="<?php echo base_url(); ?>../favicon.ico" type="image/x-icon"/>
    <link rel="icon" href="<?php echo base_url(); ?>../favicon.ico" type="image/x-icon"/>
    <script  src="<?php echo base_url(); ?>../assets/js/jquery.min.js"></script>
    <script  src="<?php echo base_url(); ?>../assets/js/cron.js"></script>
    <script  src="<?php echo base_url(); ?>../assets/js/jquery.icheck.min.js"></script>
    <script  src="<?php echo base_url(); ?>../assets/js/jquery-ui.custom.js"></script>
    <script  src="<?php echo base_url(); ?>../assets/js/amcharts.js"></script>
    
  
    <script  src="<?php echo base_url(); ?>../assets/js/export.js"></script>
    <script type="text/javascript">
        var centreGot = false;
    </script>
    
    <!--[if lt IE 9]>   
    <script type="text/javascript" src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>


<body data-color="grey" style="padding: 0 !important; background-color: transparent" class="flat <?php //echo $clase; ?> " >
    <div id="wrapper" style="background-color: #e9c899">
    	<button onclick="vistaModal()" style="position: fixed;z-index: 99;display: none">Modal</button>
        
    	
    	<div class=" header header-<?php echo str_replace(' ','-',$this->session->userdata('tiempo')); ?>" >
    	

        <a href="<?php echo base_url(); ?>"><h1 title="Ir a la p&aacute;gina principal" class="tip-bottom"></h1></a>
    			
        

<!--LOGO mirandes-->	
<div id="content-logo" style="margin-top: 45px; width: 80%"><img  style="height: 90px;position: absolute;" src="<?php echo base_url();?>../assets/img/MirandesTrans.png" /></div>
<!--FIN LOGO mirandes-->	
    			
    			<center>
<style>
@media (max-width: 600px) {
  .subcontainer {
    display: none;
  }
  #content-logo {
    margin-left: -60px;
    text-align:center;
  }
  .activo{
    display: none;
    }
}
.container-fluid{
    background:#e9c899;
}
.activo{
    font-size: 7px;
}


</style>
                
<!-- MENSAJE -->
<?php $msj = $this->session->userdata('mensaje'); ?>
<div class="subcontainer" style="text-shadow: 2px 2px 2px #696;position: absolute; left: 380px; top: 65px; z-index: 100;  font: oblique bold 250% cursive; color: #8757AD"><?php IF(!empty($msj)) echo $this->session->userdata('mensaje')?></div>  
<!-- FIN MENSAJE -->


<script>
//script para ocultar y mostrar menu lateral en mobile
function ocultar(){
	if($('#sidebar').css('display') == 'none')
	{
	$('#sidebar').css('display','block');
	}else{
	$('#sidebar').css('display','none');
	}
}
</script>                

 	
<script async="async"  type="text/javascript">

</script>

    			</center>
  		</div>
<?php /*
    function fahrenheit_to_celsius($given_value)
    {
        $celsius=5/9*($given_value-32);
        return round($celsius).'°' ;
    }
*/
	
?>

