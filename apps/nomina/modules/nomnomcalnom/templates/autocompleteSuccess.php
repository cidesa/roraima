<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:autocompleteSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/04/09 17:27:37
?>
<ul style="overflow:auto; height:200px; width:auto">
<?
foreach ($tags as $value) 
{
?>	
    <li><?=$value?></li>
<?    
  }
?>
</ul>