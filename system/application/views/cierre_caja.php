<?php setlocale(LC_TIME,"es_ES", "es_ES.utf8");?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?=$this->config->item('base_url')?>f/css/stylev2.css">
    <script type='text/javascript' src='<?=$this->config->item('base_url')?>f/js/jquery-1.10.2.js'></script>
    <script type='text/javascript' src='<?=$this->config->item('base_url')?>f/js/jquery-ui-1.10.3.custom.min.js'></script>
    <script type='text/javascript' src='<?=$this->config->item('base_url')?>f/js/busc.js'></script>
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
              <h1 style="background-color: #9C9C9C; border-radius: 10px; height:46px;text-align: center;margin: auto; padding-top:10px; ">Caja</h1>
              <br/>
              <br/>
              <hr>
              <div class="row-fluid">
                <form method='post' action="<?php echo base_url()?>caja/cerrar_caja" value="">
                <fieldset>
                <legend>Cierre de Caja</legend>
                <?php if(isset($mensaje)):?>
                <p style="color:blue"><?php echo $mensaje; ?></p>
                <?php endif?>
                <table>
                <tr>
                <td colspan="2"><input id="det_" type="radio" name="tipo_cierre" value="detallada">Detallada</td>
                </tr>
                <tr>
                <td colspan="2"><input id="res_" type="radio" name="tipo_cierre" value="resumida" checked="checked">Resumida</td>
                </tr>
                <tr>
                <td><label>Usuario :</label></td>
                <td><input type="text" placeholder="0001" name="id_usuario"></td>
                </tr>
                <tr>
                <td><label>Caja :</label></td>
                <td><input type="text" placeholder="01" name="id_caja"></td>
                </tr>
                <tr>
                <td><label class="resumido">Monto Soles :</label></td>
                <td><input class="resumido" type="text" placeholder="..." name="soles_final"></td>
                </tr>
                <tr>
                <td><label class="resumido">Monto Dólares :</label></td>
                <td><input class="resumido" type="text" placeholder="..." name="dolares_final"></td>
                </tr>
                <tr>
                <td><label class="detallado">MONEDA 0.10 :</label></td>
                <td><input class="detallado" type="text" placeholder="0" name="mon_010f"></td>
                </tr>
                <tr>
                <td><label class="detallado">MONEDA 0.20 :</label></td>
                <td><input class="detallado" type="text" placeholder="0" name="mon_020f"></td>
                </tr>
                <tr>
                <td><label class="detallado">MONEDA 0.50 :</label></td>
                <td><input class="detallado" type="text" placeholder="0" name="mon_050f"></td>
                </tr>
                <tr>
                <td><label class="detallado">MONEDA 1 :</label></td>
                <td><input class="detallado" type="text" placeholder="0" name="mon_1f"></td>
                </tr>
                <tr>
                <td><label class="detallado">MONEDA 2 :</label></td>
                <td><input class="detallado" type="text" placeholder="0" name="mon_2f"></td>
                </tr>
                <tr>
                <td><label class="detallado">MONEDA 5 :</label></td>
                <td><input class="detallado" type="text" placeholder="0" name="mon_5f"></td>
                </tr>
                <tr>
                <td><label class="detallado">BILLETE 10 :</label></td>
                <td><input class="detallado" type="text" placeholder="0" name="bill_10f"></td>
                </tr>
                <tr>
                <td><label class="detallado">BILLETE 20 :</label></td>
                <td><input class="detallado" type="text" placeholder="0" name="bill_20f"></td>
                </tr>
                <tr>
                <td><label class="detallado">BILLETE 50 :</label></td>
                <td><input class="detallado" type="text" placeholder="0" name="bill_50f"></td>
                </tr>
                <tr>
                <td><label class="detallado">BILLETE 100 :</label></td>
                <td><input class="detallado" type="text" placeholder="0" name="bill_100f"></td>
                </tr>
                <tr>
                <td><label class="detallado">BILLETE 200 :</label></td>
                <td><input class="detallado" type="text" placeholder="0" name="bill_200f"></td>
                </tr>
                <tr>
                <td><label class="detallado">BILLETE 10 DÓLARES :</label></td>
                <td><input class="detallado" type="text" placeholder="0" name="bill_10df"></td>
                </tr>
                <tr>
                <td><label class="detallado">BILLETE 20 DÓLARES :</label></td>
                <td><input class="detallado" type="text" placeholder="0" name="bill_20df"></td>
                </tr>
                <tr>
                <td><label class="detallado">BILLETE 50 DÓLARES :</label></td>
                <td><input class="detallado" type="text" placeholder="0" name="bill_50df"></td>
                </tr>
                <tr>
                <td><label class="detallado">BILLETE 100 DÓLARES :</label></td>
                <td><input class="detallado" type="text" placeholder="0" name="bill_100df"></td>
                </tr>
              </table>
                
                </br>
                <input type="submit" name="cierre_caja" value ="Registrar" ><a href="<?php echo base_url() ;?>mesas" class="btn btn-danger">Cancelar</a>
                </fieldset>
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