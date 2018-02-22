
<div id="content" style="-webkit-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
-moz-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);z-index: 25 ">
    <div id="content-header" style="background-color: #e9c899; max-height: 10px !important" >
        <h1 style="background-color: #a15ebe !important;border:none;color:#ffffff; margin-right: 30px;-webkit-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);" class="alert alert-info"><?php echo $title;?></h1>
    </div>
    
    
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12"></div>
                


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" >
                        
                            
                <br>
                
                <div class="col-lg-12">
                    <?php $attributes = array('id' => 'form');
                        echo form_open('hd_admision/taller/guardarTaller',$attributes);
                    ?>
                    <input type="hidden" name="talId" value="<?php IF(!empty($taller->talId))echo $taller->talId; ?>">
                    
                    
                    <div class="col-lg-2">
                        <label>Nombre</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" name="descripcion" required style="width:100%" value="<?php IF(!empty($taller->talDescripcion))echo $taller->talDescripcion; ?>" title="Ingrese una descripción del taller">
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Descripción</label>
                    </div>
                    <div class="col-lg-9">
                        <textarea name="observacion" style="width:100%;overflow: hidden" ><?php IF(!empty($taller->talObservacion))echo $taller->talObservacion; ?></textarea>
                    </div>
                    <div class="col-lg-12" align="center"><br>
                    <?php echo form_submit('','Guardar','class="btn btn-primary btn-sm btnCetep"');?>
                        <br>
                    </div>
                    <?php echo form_close();?>
                </div>
                
            
                
<div class="col-lg-12"></div>
<div class="col-lg-1"></div>
<div class="col-lg-10">

        </div><!-- div class='widget-content'-->    
                    
                
                
            </div><!-- div class="col-xs-12" -->
        </div><!-- row -->
   </div>
</div><!-- content -->
</div>



    
<script src="<?php echo base_url(); ?>../assets/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/hs.tables.js"></script>

