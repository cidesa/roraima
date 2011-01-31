<?php
/*
 * Created on 10/11/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
 <?php echo select_tag('empresa[codempdes]', options_for_select(EmpresaPeer::getEmpresas(),$empresa->getCodempdes()),array()) ?>