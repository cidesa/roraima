<?php
/**
 * Inmueblescatastro: Clase estática para el manejo del negocio del modulo de catastro
 *
 * @package    Roraima
 * @subpackage catastro
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Inmueblescatastro {

  public static function SalvarCatreginm($clasemodelo, $gridpersonas, $gridconstruccion, $gridterreno, $gridusoespe)
  {
	try{
  	$clasemodelo->save();
  	if (self::GrabarPersonas($clasemodelo, $gridpersonas)!=-1) return 8881;
  	if (self::GrabarConstruccion($clasemodelo, $gridconstruccion)!=-1) return 8882;
  	if (self::GrabarTerreno($clasemodelo, $gridterreno)!=-1) return 8883;
  	if (self::GrabarUsoEspecifico($clasemodelo, $gridusoespe)!=-1) return 8884;

  	return -1;
	} catch (Exception $ex){
			//echo $ex;exit();
		 return 0;
	}

  }

	public static function GrabarUsoEspecifico($clasemodelo, $grid){
	try{
	  $x=$grid[0];
	  $j=0;
	  while ($j<count($x))
	  {
	    $x[$j]->setCatreginmId($clasemodelo->getId());
	    //$x[$j]->setCatregperId(H::getX('cedrif','catregper','id',$x[$j]->getCedrif()));
	    //$x[$j]->setCatcarconId(H::getX('id','catcarcon','tipo',$x[$j]->getCatcarconid()));

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
		 return 0;
	}

   }


	public static function GrabarTerreno($clasemodelo, $grid){
	try{
	  $x=$grid[0];
	  $j=0;
	  while ($j<count($x))
	  {
	    if ($x[$j]->getDimensiones()>0 && $x[$j]->getValor()>0){
	    $x[$j]->setCatreginmId($clasemodelo->getId());
	    //$x[$j]->setCatregperId(H::getX('cedrif','catregper','id',$x[$j]->getCedrif()));
	    //$x[$j]->setCatcarconId(H::getX('id','catcarcon','tipo',$x[$j]->getCatcarconid()));

	    $x[$j]->save();
	    }
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
		//echo $ex;exit();
		 return 0;
	}

   }


	public static function GrabarConstruccion($clasemodelo, $grid){
	try{
	  $x=$grid[0];
	  $j=0;
	  while ($j<count($x))
	  {
            if (($x[$j]->getCancar()!='' || $x[$j]->getCancar()>0) && ($x[$j]->getMetare()!='' || $x[$j]->getMetare()>0)){
	    $x[$j]->setCatreginmId($clasemodelo->getId());
	    //$x[$j]->setCatregperId(H::getX('cedrif','catregper','id',$x[$j]->getCedrif()));
	    //$x[$j]->setCatcarconId(H::getX('id','catcarcon','tipo',$x[$j]->getCatcarconid()));

	    $x[$j]->save();
            }
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
		echo $ex;exit();
		 return 0;
	}

   }


    public static function GrabarPersonas($clasemodelo, $grid){
    try{
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
        $x[$j]->setCatreginmId($clasemodelo->getId());
        //$x[$j]->setCatregperId(H::getX('cedrif','catregper','id',$x[$j]->getCedrif()));

        $x[$j]->save();
         $j++;
      }

//exit();
      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }

		return -1;
	} catch (Exception $ex){
		//echo $ex;exit();
		 return 0;
	}

    }

}
?>
