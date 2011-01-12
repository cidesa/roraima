<?php
/**
 * Instructivos: Clase estática para el manejo de los Instructivos
 *
 * @package    Roraima
 * @subpackage formulacion
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:Instructivos.class.php 32397 2009-09-01 19:18:37Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Instructivos {

  public static function salvar_forcfgrepins($clase,$grid)
  {
      $x=$grid[0];
	  $i=0;
	  $nrofor=$clase->getNrofor();
	  $descrip=$clase->getDescripcion();
	  while ($i<count($x))
	  {
    	$x[$i]->setNrofor($nrofor);
    	$x[$i]->setDescripcion($descrip);
    	$x[$i]->save();
       $i++;
      }
      $z=$grid[1];
       $j=0;
       if (!empty($z[$j]))
       {
	     while ($j<count($z))
	     {
	       $z[$j]->delete();
	       $j++;
	     }
      	}
	return -1;
  }
}
?>