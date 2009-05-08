<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo Catalogo($npdefcpt,0,array(
  'getprincipal' => 'getCodpar2',
  'getsecundario' => 'getNompar2',
  'campoprincipal' => 'codpar',
  'camposecundario'=> 'nompar',
  'campobase' => 'id',
  ), 'Asignarpartidasconceptos_Nppartidas', 'nppartidas', '','','' );
?>

<ul  class="sf_admin_actions" >
<?php echo submit_to_remote('btnCalcular', 'Asignar Partidas', array(
         'update'  => 'grid',
         'url'      => 'asignarpartidasconceptos/ajax',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'with'     => "'ajax=2&codcar='+$('npdefcpt_codcar2').value+'&codpar='+$('npdefcpt_codpar').value+'&codcon='+$('npdefcpt_codcon').value",
));
 ?>
</ul>