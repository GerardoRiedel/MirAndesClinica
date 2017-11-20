/**
 * Created by CETEP on 27/05/2015.
 */
<link rel="stylesheet" href="<?php echo $LIB; ?>/colorbox/colorbox2.css" />
<script src="<?php echo $LIB; ?>/colorbox/jquery.colorbox.js"></script>
<script src="<?php echo $LIB; ?>/colorbox/i18n/jquery.colorbox-es.js"></script>
<script>
$(document).ready(function(){
    //Examples of how to assign the Colorbox event to elements

    $(".ajax").colorbox();
    $(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
    $(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
    $(".iframe").colorbox({iframe:true,data:true, opacity:"0.6", width:"50%", height:"70%" ,overlayClose:false});
    $(".inline").colorbox({inline:true, width:"50%"});
    $(".callbacks").colorbox({
        onOpen:function(){ alert('onOpen: colorbox is about to open'); },
        onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
        onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
        onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
        onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
    });


    //Example of preserving a JavaScript event for inline calls.
    $("#click").click(function(){
        $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
        return false;
    });



});