<?php
class Licitacion
{


public static function salvarLicitacion($lireglic, $grid)
{
  $lireglic->save();
  $x=$grid[0];
  $j=0;
  while ($j<count($x))
  {
     if ($x[$j]->getPeriodico()!='')
     {
     $x[$j]->setCodlic($lireglic->getCodlic());
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
}

  public static function salvarEmpresasOfertas($liemppar,$grid)
  {
  	$codlic=$liemppar->getCodlic();
  	$idlic=$liemppar->getLireglicId();

    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCodpro()!="")
     {
      $x[$j]->setCodlic($codlic);
      $x[$j]->setLireglicId($idlic);
      if ($x[$j]->getPrecal()==0)
      {
       $x[$j]->setPrecal(null);
      }
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
  }

  public static function salvarEmpresasOferentes($liempofe,$grid)
  {
  	$codlic=$liempofe->getCodlic();
  	$idlic=$liempofe->getLireglicId();

    $c= new Criteria();
  	$c->add(LiempofePeer::LIREGLIC_ID,$idlic);
  	LiempofePeer::doDelete($c);
    $x=$grid[0];
  //  H::PrintR($x);exit;
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getOferente())
     {
      $regaux= new Liempofe();
      $regaux->setCodlic($codlic);
      $regaux->setLireglicId($idlic);
      if ($x[$j]->getPrecal()==0)
      {
       $regaux->setPrecal(null);
      }
      $regaux->setCodpro($x[$j]->getCodpro());
      $regaux->setFecins($x[$j]->getFecins());
      $regaux->setMontot($x[$j]->getMontot());
      $regaux->setObservaciones($x[$j]->getObservaciones());
      $regaux->save();
     }
     $j++;
    }
  }

  public static function salvarEmpresasRecaudos($liasplegcrieva,$grid)
  {
  	$codpro=$liasplegcrieva->getCodpro();
  	$codlic=$liasplegcrieva->getCodlic();
  	$idlic=$liasplegcrieva->getLireglicId();

    $c= new Criteria();
  	$c->add(LiasplegcrievaPeer::CODLIC,$codlic);
  	$c->add(LiasplegcrievaPeer::CODPRO,$codpro);
  	LiasplegcrievaPeer::doDelete($c);
    $x=$grid[0];

    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getSeleccionado())
     {
      $regaux= new Liasplegcrieva();
      $regaux->setCodlic($codlic);
      $regaux->setLireglicId($idlic);
      $regaux->setCodpro($codpro);
      $regaux->setLirecaudId($x[$j]->getLirecaudId());
      $regaux->setPuntaje($x[$j]->getPuntaje());
      $regaux->save();
     }
     $j++;
    }
  }

  public static function salvarEmpresasCriteriosTecnicos($liasptecanalis,$grid)
  {
  	$codpro=$liasptecanalis->getCodpro();
  	$codlic=$liasptecanalis->getCodlic();
  	$idlic=$liasptecanalis->getLireglicId();

    $c= new Criteria();
  	$c->add(LiasptecanalisPeer::CODLIC,$codlic);
  	$c->add(LiasptecanalisPeer::CODPRO,$codpro);
  	LiasptecanalisPeer::doDelete($c);
    $x=$grid[0];

    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getSeleccionado())
     {
      $regaux= new Liasptecanalis();
      $regaux->setCodlic($codlic);
      $regaux->setLireglicId($idlic);
      $regaux->setCodpro($codpro);
      $regaux->setLiaspteccrievaId($x[$j]->getLiaspteccrievaId());
      $regaux->setPuntaje($x[$j]->getPuntaje());
      $regaux->save();
     }
     $j++;
    }
  }

  public static function salvarEmpresasCriteriosFinancieros($liaspfinanalis,$grid)
  {
  	$codpro=$liaspfinanalis->getCodpro();
  	$codlic=$liaspfinanalis->getCodlic();
  	$idlic=$liaspfinanalis->getLireglicId();

    $c= new Criteria();
  	$c->add(LiaspfinanalisPeer::CODLIC,$codlic);
  	$c->add(LiaspfinanalisPeer::CODPRO,$codpro);
  	LiaspfinanalisPeer::doDelete($c);
    $x=$grid[0];

    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getSeleccionado())
     {
      $regaux= new Liaspfinanalis();
      $regaux->setCodlic($codlic);
      $regaux->setLireglicId($idlic);
      $regaux->setCodpro($codpro);
      $regaux->setLiaspfincrievaId($x[$j]->getLiaspfincrievaId());
      $regaux->setPuntaje($x[$j]->getPuntaje());
      $regaux->save();
     }
     $j++;
    }
  }

  public static function salvarComisionLicitacion($licomlic,$grid)
  {

  	$licomlic->save();

    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCodemp()!="")
     {
      $x[$j]->setLicomlicId($licomlic->getId());
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
  }

 public static function salvarOferPre($lioferpre,$grid)
  {
  	$codlic=$lioferpre->getCodlic();
  	$idlic=$lioferpre->getLireglicId();
    $codpro=$lioferpre->getCodpro();

    $c= new Criteria();
    $c->add(LioferprePeer::CODLIC,$lioferpre->getCodlic());
    $c->add(LioferprePeer::CODPRO,$lioferpre->getCodpro());
    LioferprePeer::doDelete($c);

    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCodpar()!="")
     {
      $regaux= new Lioferpre();
      $regaux->setCodlic($codlic);
      $regaux->setLireglicId($idlic);
      $regaux->setCodpro($codpro);
      $regaux->setCodpar($x[$j]->getCodpar());
      $regaux->setCant($x[$j]->getCant());
      $regaux->setPrecio($x[$j]->getPrecio());
      $regaux->setMonsiniva($x[$j]->getMonsiniva());
      $regaux->setIva($x[$j]->getIva());
      $regaux->setMontot($x[$j]->getMontot());
      $regaux->save();
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
  }


  public static function salvarCalculoVAN($licalvan,$grid)
  {
  	$codlic=$licalvan->getCodlic();
 	$idlic=$licalvan->getLireglicId();


    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCodpro())
     {
      $x[$j]->setCodlic($codlic);
      $x[$j]->setLireglicId($idlic);
      $x[$j]->save();
     }
     $j++;
    }
  }
}
?>