<?php

class Catastro {

    public static function SalvarCatdefniv($clasemodelo,$grid) {
    try{
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
        $x[$j]->setForcodcat($clasemodelo->getForcodcat());
        if ($x[$j]->getEssector()=='1')
        {
        	$x[$j]->setEssector('S');
        }else $x[$j]->setEssector(null);
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

       public static function salvarAvaluos($clasemodelo,$grid) {
	    try{
	      $clasemodelo->save();
	      $x=$grid[0];
		  $j=0;
		  if (count($x)>0)
		  {
			  while ($j<count($x))
			  {
	              $catdetaval= new Catdetaval();
	              $catdetaval->setCatdefavalId($clasemodelo->getId());
	              $catdetaval->setCatusoespId($x[$j]->getCatusoespId());
	              $catdetaval->setTipo($x[$j]->getTipo());
	              $catdetaval->setMontot($x[$j]->getMontot());
                  $catdetaval->save();

			    $j++;
			  }
		  }
			return -1;
		} catch (Exception $ex){
			 return 0;
		}
    }
}
?>