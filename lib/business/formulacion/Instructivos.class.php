<?php

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