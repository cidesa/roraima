<?php
/*
 * Created on 13/03/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>

<div id="divGrid">
<?
 echo grid_tag($nptippre->getObj());
?>
</div>