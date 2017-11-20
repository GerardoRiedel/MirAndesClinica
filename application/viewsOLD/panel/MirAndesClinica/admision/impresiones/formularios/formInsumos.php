<?php //error_reporting(E_ALL ^ E_NOTICE); ?>
<div style="page-break-before: always;">
    
<div class="col-lg-12" align="center" >
    <style>
    td:first-child, th:first-child {
        border-left: none;
    }
    </style>
    <table style="width: 650px; border:none">
        <tr>
            <td style="border:none"><img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo"></td>
            <td style="border:none"align="left"><b>COBRO DE MEDICAMENTO EN STOCK</b></td>
        </tr>
    </table>
    <br><br>
    <table style="width: 650px; border:none">
        <tr>
            <td style="border:none"><b>PACIENTE:</b></td>
            <td style="border:none" align="left"><?php echo ' '.strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno).' '; ?>&nbsp;</td>
            <td style="border:none"><b>RUT:</b></td>
            <td style="border:none" align="left"><?php echo ' '.formatearRut($datos->rut);?></td>
        </tr>
        <tr>
            <td style="border:none"><b>FICHA:</b></td>
            <td style="border:none" align="left"><?php echo ' '.$datos->ficha;?></td>
            <td style="border:none"><b>FECHA INGRESO:</b></td>
            <td style="border:none" align="left"><?php $date = new DateTime($datos->fechaIngreso); echo ' '.date_format($date, 'd-m-Y');?></td>
        </tr>
        <tr>
            <td style="border:none"></td>
            <td style="border:none"></td>
            <td style="border:none"><b>FECHA ALTA:</b></td>
            <td style="border:none" align="left"><?php IF(!empty($datos->fechaSalidaReal)&&$datos->fechaSalidaReal!=='0000-00-00'){$date = new DateTime($datos->fechaSalidaReal); echo ' '.date_format($date, 'd-m-Y');}?></td>
        </tr>
    </table>
    <br>
    <table style="width: 650px;border-collapse:separate;border:solid black 1px;border-radius:6px;-moz-border-radius:6px;">
        <thead>
            <tr>
                <td style="border-top:none;border-right: none" align="center"><b>INSUMO / MEDICAMENTO</b></td>
                <td style="border-top:none;border-right: none" align="center"><b>COD EXAMEN</b></td>
                <td style="border-top:none;border-right: none" align="center"><b>VALOR</b></td>
                <td style="border-top:none;border-right: none" align="center"><b>CANTIDAD</b></td>
                <td style="border-top:none;border-right: none" align="center"><b>TOTAL</b></td>
            </tr>
        </thead>
        <tbody>

            <?php $total = 0;?>
            <?php foreach ($insumosAsignados as $item) : ?>
            <tr>
                    <?php IF($item->inaTipo==='2'){?>
                    <td align="left" style="border-left:none;border-top:none;border-right:none;border-bottom:solid black 1px;"><?php echo strtoupper($item->descripcion); ?></td>
                    <?php }ELSEIF($item->inaTipo==='1'){?>
                    <td align="left" style="border-left:none;border-top:none;border-right:none;border-bottom:solid black 1px;"><?php echo strtoupper($item->insNombre); ?></td>
                    <?php }ELSEIF($item->inaTipo==='3'){?>
                    <td align="left" style="border-left:none;border-top:none;border-right:none;border-bottom:solid black 1px;"><?php echo strtoupper($item->exaNombre); ?></td>
                    <?php };?>
                    <td align="center" style="border-left:solid black 1px;border-top:none;border-right:none;border-bottom:solid black 1px;"><?php IF(!empty($item->exaCodigo))echo $item->exaCodigo;?></td>
                    <td align="center" style="border-left:solid black 1px;border-top:none;border-right:none;border-bottom:solid black 1px;"><?php echo '$ '.$item->inaValor; ?></td>
                    <td align="center" style="border-left:solid black 1px;border-top:none;border-right:none;border-bottom:solid black 1px;"><?php echo $item->inaCantidad; ?></td>
                    <td align="center" style="border-left:solid black 1px;border-top:none;border-right:none;border-bottom:solid black 1px;"><?php echo '$ '.$item->inaValor*$item->inaCantidad; ?></td>
                    <?php $total += ($item->inaValor*$item->inaCantidad);?>

            </tr>
            <?php endforeach; ?>
            <tr>
                <td style="border:none"></td>
                <td style="border:none"></td>
                <td style="border:none"></td>
                <td style="border:none" align=" center"><b>TOTAL</b></td>
                <td style="border:none" align=" center">
                    <b><?php echo '$ '.$total;?></b>
                </td>
            </tr>        
        </tbody>
    </table>
</div>
</div>


