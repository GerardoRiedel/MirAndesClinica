<html>
<head>
   <meta charset="utf-8">
   <title>Mostrar Ventane Modal de forma Automático</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
   <script>
      $(document).ready(function()
      {
          setTimeout(function() {window.location.href='<?php base_url(); ?>cargarContacto/'}, 2000);
         
      });
    </script>
</head>
<body  style="opacity: 0.5">
    <div class="modal-dialog" id="mostrarmodal">
        <div class="modal-content">
           <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3>Confirmación Exitosa</h3>
           </div>
           <div class="modal-body">
              <h4>Correo enviado correctamente</h4>
              El correo a sido enviado a los destinatarios:
              <br>
              &nbsp;- <?php echo $this->input->post('destinatarios');?>
              
       </div>
           <div class="modal-footer">
          <a href="<?php echo base_url("hd_admision/ingresos/cargarContacto/")?>" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</body>
</html>
