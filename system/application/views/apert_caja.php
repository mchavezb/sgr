<?php setlocale(LC_TIME,"es_ES", "es_ES.utf8");?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?=$this->config->item('base_url')?>f/css/stylev2.css">
    <script type='text/javascript' src='<?=$this->config->item('base_url')?>f/js/jquery-1.10.2.js'></script>
    <script type='text/javascript' src='<?=$this->config->item('base_url')?>f/js/jquery-ui-1.10.3.custom.min.js'></script>
    <script type='text/javascript' src='<?=$this->config->item('base_url')?>f/js/busc.js'></script>
    <script src="<?=$this->config->item('base_url')?>f/js/validar.js"></script>
       <script type="text/javascript">
            $(function(){
                //Para escribir solo letras
                $('.letras').validM(' abcdefghijklmnñopqrstuvwxyzáéiou');

                //Para escribir solo numeros    
                $('.numeros').validM('0123456789'); 
                $('.numerosp').validM('.0123456789');   
            });
        </script>
  </head>

    <div id="header">
        <?php $this->load->view('common/header_vw'); ?>
    </div>
    <div id="separator"></div>
    <div id="container">
        <div id="aside-left">
            <div id="aside">
                <?php $this->load->view('common/menu_vw'); ?>
            </div>
        </div>
        <div id="main-content">
            <div id="contenido">
                <table class="ventas-table">
                    <thead>
                        <tr>
                            <th colspan="3">Caja</th>
                        </tr>
                        <tr>
                            <th colspan="3">Apertura de Caja</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($mensaje)){?>
                        <tr>
                            <td colspan="3"><?php echo $mensaje; ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <form method='post' action="<?php echo base_url()?>caja/apert_caja" value="">
                            <td>Usuario :
                                <select name="id_usuario" width="150px" style="width: 160px">
                                    <option value="<?php echo $this->session->userdata['idUsuario'];?>"><?php echo $this->session->userdata['nombres'].' '.$this->session->userdata['apellidos'];?>
                                    </option>
                                    <?php foreach ($lista_cajeros as $v) {
                                            if($v['idUsuario']!=$this->session->userdata['idUsuario']){?>
                                    <option value="<?php echo $v['idUsuario']?>"><?php echo $v['nombres'].' '.$v['apellidos'];?></option>
                                <?php } }?>              
                                </select>
                            </td>
                            <td>Caja :
                                <select name="id_caja" style="width: 80px">
                                    <?php foreach ($lista_cajas as $v) {?>
                                    <option value="<?php echo $v['idCaja']?>"><?php echo $v['caja_numero'];?></option>
                                    <?php }?>
                                </select>
                            </td>
                            <td>Tipo :
                                <input id="det_" type="radio" name="tipo_apertura" value="detallada">Detallada
                                <input id="res_" type="radio" name="tipo_apertura" value="resumida" checked="checked">Resumida
                            </td>
                        </tr>
                        <tr class="resumido">
                            <td><label class="resumido">Monto Soles :</label>
                                <input class="resumido numerosp" type="text" placeholder="..." name="soles_inicio">
                            </td>
                            <td colspan="2"><label class="resumido">Monto Dólares :</label>
                                <input class="resumido numerosp" type="text" placeholder="..." name="dolares_inicio">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="ventas-table detallado">
                    <thead>
                        <tr>
                            <th colspan="2">Monedas</th>
                            <th colspan="3">Billetes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <label class="detallado">S/. 0.10</label>
                                <input style="width: 40px" class="detallado numeros" type="text" placeholder="0" name="mon_010i">
                            </td>
                            <td>
                                <label class="detallado">$/. 1.00</label>
                                <input style="width: 40px" class="detallado numeros" type="text" placeholder="0" name="mon_1i">
                            </td>
                            <td>
                                <label class="detallado">S/. 10</label>
                                <input style="width: 40px" class="detallado numeros" type="text" placeholder="0" name="bill_10i">
                            </td>
                            <td>
                                <label class="detallado">S/. 100</label>
                                <input style="width: 40px" class="detallado numeros" type="text" placeholder="0" name="bill_100i">
                            </td>
                            <td>
                                <label class="detallado">$. 20</label>
                                <input style="width: 40px" class="detallado numeros" type="text" placeholder="0" name="bill_20di">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="detallado">S/. 0.20</label>
                                <input style="width: 40px" class="detallado numeros" type="text" placeholder="0" name="mon_020i">
                            </td>
                            <td>
                                <label class="detallado">S/. 2.00</label>
                                <input style="width: 40px" class="detallado numeros" type="text" placeholder="0" name="mon_2i">
                            </td>
                            <td>
                                <label class="detallado">S/. 20</label>
                                <input style="width: 40px" class="detallado numeros" type="text" placeholder="0" name="bill_20i">
                            </td>
                            <td>
                                <label class="detallado">S/. 200</label>
                                <input style="width: 40px" class="detallado numeros" type="text" placeholder="0" name="bill_200i">
                            </td>
                            <td>
                                <label class="detallado">$. 50</label>
                                <input style="width: 40px" class="detallado numeros" type="text" placeholder="0" name="bill_50di">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="detallado">S/. 0.50</label>
                                <input style="width: 40px" class="detallado numeros" type="text" placeholder="0" name="mon_050i">
                            </td>
                            <td>
                                <label class="detallado">S/. 5.00</label>
                                <input style="width: 40px" class="detallado numeros" type="text" placeholder="0" name="mon_5i">
                            </td>
                            <td>
                                <label class="detallado">S/. 50</label>
                                <input style="width: 40px" class="detallado numeros" type="text" placeholder="0" name="bill_50i">
                            </td>
                            <td>
                                <label class="detallado">$. 10</label>
                                <input style="width: 40px" class="detallado numeros" type="text" placeholder="0" name="bill_10di">
                            </td>
                            <td>
                                <label class="detallado">$. 100</label>
                                <input style="width: 40px" class="detallado numeros" type="text" placeholder="0" name="bill_100di">
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
                <table width="700px">
                    <tbody>
                        <tr class="pull-right">
                            <td><input type="submit" name="apert_caja" value ="Registrar" ></td>
                        </tr>
                    </tbody>
                </table>
            </form>
             
                
              </div><!--/row-->
            </div>
        </div>
    </div>

   <script type="text/javascript">
    $(document).ready(function() {
        $(".detallado").hide();
        if($('#det_').is(':checked')==true){
            $(".detallado").show();
            $(".resumido").hide();
        }
        if($('#res_').is(':checked')==true){
            $(".resumido").show();
            $(".detallado").hide();
        }
    });
</script>
<script>
    $('#det_').click(function(){
            $(".detallado").show();
            $(".resumido").hide();
        });
    $('#res_').click(function(){
            $(".detallado").hide();
            $(".resumido").show();
        });
</script>
          
         
        

  </body>
</html>