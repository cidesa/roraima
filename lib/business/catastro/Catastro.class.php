<?php

class Catastro {

    public static function SalvarCatdefniv($clasemodelo,$grid) {
    try{
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
        $x[$j]->setForcodcat($clasemodelo->getForcodcat());
        $x[$j]->save();
        $j++;
      }

      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }

		return -1;
	} catch (Exception $ex){
		echo $ex; exit();
		 return 0;
	}

    }

   public static function FormarCodigoCatastral($clasemodelo,$grid)
   {
      $x=$grid[0];
      H::printR($x);
      exit();
      $j=0;
      $cod='';
      while ($j<count($x))
      {
      	echo $j;
        $cod = $cod.'-'.$x[$j]->getLonniv();
        $j++;
      }

      echo $cod;
      exit();
      return $cod;
   }
}
?>