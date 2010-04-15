<?php
/**
 * Catastro: Clase estática para el manejo del negocio del modulo de catastro
 *
 * @package    Roraima
 * @subpackage catastro
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
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

    public static function BuscarNrocas($codivgeo,&$nro)
    {
      $t= new Criteria();
      $t->add(CatreginmPeer::CODDIVGEO,$codivgeo);
      $t->add(CatreginmPeer::NROCAS,$nro);
      $regi= CatreginmPeer::doSelectOne($t);
      if ($regi)
      {
      	$nro=$nro+1;
      	self::BuscarNrocas($codivgeo,&$nro);
      }
      return $nro;
    }

    public static function generarCedCas($catreginm)
    {
    	$p= new Criteria();
    	$p->add(CatreginmPeer::CODDIVGEO,$catreginm->getCoddivgeo());
    	$p->add(CatreginmPeer::NROCAS,$catreginm->getNrocas());
    	$reg= CatreginmPeer::doSelectOne($p);
    	if ($reg)
    	{
    		$nro=$catreginm->getCorinicas();
    		$i=1;
    		while($i<=$catreginm->getCant())
    		{
    		  $catreginm2= new Catreginm();
    		  $catreginm2->setCoddivgeo($reg->getCoddivgeo());
    		  $catreginm2->setNrocas(self::BuscarNrocas($reg->getCoddivgeo(),&$nro));
    		  $catreginm2->setFecreg(date('Y-m-d'));
    		  $catreginm2->setNroinc($reg->getNroinc());
    		  $catreginm2->setAsireg($reg->getAsireg());
    		  $catreginm2->setNromat($reg->getNromat());
    		  $catreginm2->setFolio($reg->getFolio());
    		  $catreginm2->setCodcatant($reg->getCodcatant());
    		  $catreginm2->setFecregant($reg->getFecregant());
    		  $catreginm2->setNumregant($reg->getNumregant());
    		  $catreginm2->setTriant($reg->getTriant());
    		  $catreginm2->setProant($reg->getProant());
    		  $catreginm2->setFolioant($reg->getFolioant());
    		  $catreginm2->setCatbarurbId($reg->getCatbarurbId());
    		  $catreginm2->setCattramofroId($reg->getCattramofroId());
    		  $catreginm2->setCattramolatId($reg->getCattramolatId());
    		  $catreginm2->setCattramolat2Id($reg->getCattramolat2Id());
    		  $catreginm2->setEdicas($reg->getEdicas());
    		  $catreginm2->setPisinm($reg->getPisinm());
    		  $catreginm2->setNuminm($reg->getNuminm());
    		  $catreginm2->setCatcodposId($reg->getCatcodposId());
    		  $catreginm2->setUbigex($reg->getUbigex());
    		  $catreginm2->setUbigey($reg->getUbigey());
    		  $catreginm2->setUbigez($reg->getUbigez());
    		  $catreginm2->setDirinm($reg->getDirinm());
    		  $catreginm2->setLineste($reg->getLineste());
    		  $catreginm2->setLinoes($reg->getLinoes());
    		  $catreginm2->setLinnor($reg->getLinnor());
    		  $catreginm2->setLinsur($reg->getLinsur());
    		  $catreginm2->setCattipvivId($reg->getCattipvivId());
    		  $catreginm2->setCatconinmId($reg->getCatconinmId());
    		  $catreginm2->setCatconsocId($reg->getCatconsocId());
    		  $catreginm2->setNumper($reg->getNumper());
    		  $catreginm2->setNumhab($reg->getNumhab());
    		  $catreginm2->setNumsan($reg->getNumsan());
    		  $catreginm2->setArever($reg->getArever());
    		  $catreginm2->setLocind($reg->getLocind());
    		  $catreginm2->setCaptan($reg->getCaptan());
    		  $catreginm2->setTrapis($reg->getTrapis());
    		  $catreginm2->save();
    		  //self::generarPersonas($reg->getId(),$catreginm2->getId());
    		  self::generarConstruccion($reg->getId(),$catreginm2->getId());
    		  self::generarTerreno($reg->getId(),$catreginm2->getId());
    		  self::generarUsoEspecifico($reg->getId(),$catreginm2->getId());
    		$i++;
    		}
    	}
    }

    public static function generarPersonas($idviejo,$idnuevo)
    {
      $p= new Criteria();
      $p->add(CatperinmPeer::CATREGINM_ID,$idviejo);
      $result= CatperinmPeer::doSelect($p);
      if ($result)
      {
      	foreach ($result as $obj)
      	{
      		$catperinm= new Catperinm();
      		$catperinm->setCatreginmId($idnuevo);
      		$catperinm->setCatregperId($obj->getCatregperId());
      		$catperinm->setConocu($obj->getConocu());
      		$catperinm->setTipper($obj->getTipper());
      		$catperinm->save();
      	}
      }
    }

    public static function generarConstruccion($idviejo,$idnuevo)
    {
      $p= new Criteria();
      $p->add(CatcarconinmPeer::CATREGINM_ID,$idviejo);
      $result= CatcarconinmPeer::doSelect($p);
      if ($result)
      {
      	foreach ($result as $obj)
      	{
      		$catcarconinm= new Catcarconinm();
      		$catcarconinm->setCatreginmId($idnuevo);
      		$catcarconinm->setCatcarconId($obj->getCatcarconId());
      		$catcarconinm->setCancar($obj->getCancar());
      		$catcarconinm->setMetare($obj->getMetare());
      		$catcarconinm->save();
      	}
      }
    }

    public static function generarTerreno($idviejo,$idnuevo)
    {
      $p= new Criteria();
      $p->add(CatcarterinmPeer::CATREGINM_ID,$idviejo);
      $result= CatcarterinmPeer::doSelect($p);
      if ($result)
      {
      	foreach ($result as $obj)
      	{
      		$catcarterinm= new Catcarterinm();
      		$catcarterinm->setCatreginmId($idnuevo);
      		$catcarterinm->setCatcarterId($obj->getCatcarterId());
      		$catcarterinm->setDimensiones($obj->getDimensiones());
      		$catcarterinm->setValor($obj->getValor());
      		$catcarterinm->save();
      	}
      }
    }

    public static function generarUsoEspecifico($idviejo,$idnuevo)
    {
      $p= new Criteria();
      $p->add(CatusoespinmPeer::CATREGINM_ID,$idviejo);
      $result= CatusoespinmPeer::doSelect($p);
      if ($result)
      {
      	foreach ($result as $obj)
      	{
      		$catusoespinm= new Catusoespinm();
      		$catusoespinm->setCatreginmId($idnuevo);
      		$catusoespinm->setCatusoespId($obj->getCatusoespId());
      		$catusoespinm->setTipo($obj->getTipo());
      		$catusoespinm->setValor($obj->getValor());
      		$catusoespinm->save();
      	}
      }
    }
}
?>