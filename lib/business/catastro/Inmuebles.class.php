<?php

class Inmuebles {

  public static function SalvarCatreginm($clasemodelo, $gridpersonas, $gridconstruccion, $gridterreno)
  {
	try{

  	if (self::GrabarPersonas($clasemodelo, $gridpersonas)!=-1) return 0;
  	if (self::GrabarConstruccion($clasemodelo, $gridconstruccion)!=-1) return 0;
  	if (self::GrabarTerreno($clasemodelo, $gridterreno)!=-1) return 0;
  	$clasemodelo->save();
  	return -1;
  /*  $c = new Criteria();
    $lista = CatcarconPeer::doSelect($c);

H::printr($lista);
exit();
    $registro = array();

    foreach($lista as $obj)
    {
      $registro += array($obj->getId() => $obj->getNomcarcon());
    }
    return $registro;
*/

	} catch (Exception $ex){
			echo $ex;exit();
		 return 0;
	}

  }

	public static function GrabarTerreno($clasemodelo, $grid){
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


	public static function GrabarConstruccion($clasemodelo, $grid){
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
		 return 0;
	}

    }

}
?>
