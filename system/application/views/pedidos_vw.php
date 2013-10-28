<?php setlocale(LC_TIME,"es_ES", "es_ES.utf8");?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?=$this->config->item('base_url')?>f/css/stylev2.css">
    <link rel="stylesheet" type="text/css" href="<?=$this->config->item('base_url')?>f/css/jquery-ui-1.10.3.custom.min.css">
    <script type='text/javascript' src='<?=$this->config->item('base_url')?>f/js/jquery-1.10.2.js'></script>
    <script type='text/javascript' src='<?=$this->config->item('base_url')?>f/js/jquery-ui-1.10.3.custom.min.js'></script>
    <script type='text/javascript' src='<?=$this->config->item('base_url')?>f/js/busc.js'></script>
  </head>
  <body>
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
          
            <table align="center">
                <thead>
                    <tr><?php// print_r($lista_comandas)?>
                        <th width="100px">ID COMANDA</th>
                        <th width="100px">N° MESA</th>
                        <th width="100px">ID MOZO</th>
                        <th width="100px">IMPORTE</th>
                        <th width="100px">ATENCIÓN</th>
                        <th width="100px"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_comandas as $key => $value) {?>
                    <tr align="center">
                        <td width="100px"><?php echo $value->idComanda?></td>
                        <td width="100px"><?php echo $value->Mesa_idMesa?></td>
                        <td width="100px"><?php echo $value->Usuario_idUsuario?></td>
                        <?php $sum = 0;
                            foreach ($list_comxped as $k => $v) {
                                if($v->Comanda_idComanda==$value->idComanda){
                                    $sum = $sum + $v->p_precio;
                                }
                            }?>
                        <td width="100px"><?php echo $sum*1.19;?></td>
                        <td width="100px"><?php if($value->TipoComanda_idTipoComanda=='01'){echo 'EN MESA';}elseif ($value->TipoComanda_idTipoComanda=='02'){echo 'PARA LLEVAR';}?>
                        </td>
                        <td width="100px"><form style="display: inline;" method="post" action="<?php echo base_url()?>pedidos/p/<?php echo $value->Mesa_idMesa ?>"><input type="hidden" name="id_com" id="id_com" value="<?php echo $value->idComanda ?>"><input type="submit" value="DETALLE"></form></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
           
        </div>

    </div>

  </body>
</html>