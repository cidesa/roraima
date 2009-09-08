<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/14 15:39:51
?>
<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('fordefpar/list', array('method' => 'get')) ?>
  <fieldset>
    <h2><?php echo __('filters') ?></h2>

    <div class="form-row">
    <label for="codest"><?php echo __('Estado:') ?></label>
    <div class="content">
    <?php //echo select_tag('filters[codest]', objects_for_select(FordefestPeer::doSelect(new Criteria()),'getCodest','getDesest',isset($filters['codest']) ? $filters['codest'] : null,'include_custom=Seleccione')) ?>
<?
    $tablas=array('fordefest');
    $filtros_tablas=array('');
    $filtros_variales=array('');
    $campos_retornados=array('codest','desest');
    $estado= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);

?>
    <?php echo select_tag('filters[codest]', options_for_select($estado,'','include_custom=Seleccione'),array('onChange'=> remote_function(array(
    'update'   => 'divMunicipiosFiltros',
    'url'      => 'fordefpar/combo?par=1',
    'complete' => 'AjaxJSON(request, json)',
    'with' => "'estado='+this.value"
  ))));?>
    </div>
    </div>

    <div class="form-row">
    <label for="codest"><?php echo __('Municipio:') ?></label>
    <div class="content">
       <div id="divMunicipiosFiltros">
        <?php echo select_tag('filters[codmun]', objects_for_select(FordefmunPeer::doSelect(new Criteria()),'getCodmun','getDesmun',isset($filters['codmun']) ? $filters['codmun'] : null,'include_custom=Seleccione')) ?>
       </div>
    </div>
    </div>

        <div class="form-row">
    <label for="codpar"><?php echo __('Cod. Parroquia:') ?></label>

    <div class="content">
    <?php echo input_tag('filters[codpar]', isset($filters['codpar']) ? $filters['codpar'] : null, array (
  'size' => 5,
  'maxlength' => 4,
  'onBlur'  => "javascript: valor=this.value; if (valor!=''){valor=valor.pad(4, '0',0);document.getElementById('filters_codpar').value=valor};",
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="despar"><?php echo __('Descripción:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[despar]', isset($filters['despar']) ? $filters['despar'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'fordefpar/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
