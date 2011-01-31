<?php

/**
v * Subclass for performing query and update operations on the 'ccperpre' table.
 *
 *
 *
 * @package lib.model
 */
class CcperprePeer extends BaseCcperprePeer
{

  public static function getPerprebyPk(/*$eId*/)
  {
    $c = new Criteria();
    //$c->add(CcperprePeer::TIPUPS_ID,$eId);
    $m = CcperprePeer::doSelect($c);
    if($m){
      $resp = array();
      foreach($m as $pre){
        $resp[$pre->getId()] = $pre->getPrefijo();
      }
      return $resp;
    }else return array();
  }

  public static function BuscarCcperpre(){
      $c = new Criteria();
      $lista_perpre = CcperprePeer::doSelect($c);

      $perpre = array();

      foreach($lista_perpre as $obj_perpre)
      {
        $perpre += array($obj_perpre->getId() => $obj_perpre->getPrefijo());
      }
      return $perpre;

    }



  public static function BuscarPerpre($codigo){
	 $c= new Criteria();
	 $c->add(CctipupsPeer::NOMTIPUPS,'NATURAL',Criteria::LIKE);
	 $c->setIgnoreCase(true);
	 $c->setLimit(1);
	 $tipo = CctipupsPeer::doSelectOne($c);
	 if ($tipo && $tipo->getId()==$codigo){
	 	$c = new Criteria();
	 	//$c->add(CcperprePeer::TIPUPS_ID,1,Criteria::EQUAL);
	 	$lista = CcperprePeer::doSelect($c);
	 }
	else{
	 	$c = new Criteria();
	 	//$c->add(CcperprePeer::TIPUPS_ID,1,Criteria::NOT_EQUAL);
	 	$lista = CcperprePeer::doSelect($c);

	}
	$perpre=array();
	foreach($lista as $obj)
    {
      $perpre += array($obj->getId() => $obj->getPrefijo());
    }
    return $perpre;


  }


}
