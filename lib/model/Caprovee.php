<?php

/**
 * Subclass for representing a row from the 'caprovee'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Caprovee extends BaseCaprovee
{
  private $recargo ='';
  public $codtipesp='';
  public $destipesp='';
  public $objrecaudos=array();
  public $objcontactos=array();
  public $objramos=array();
  public $objretenciones=array();
  protected $tiedatrel="";
  protected $oculsave="";

   public function __toString()
  {
    return array ($this->codpro => $this->codpro);
  }


  public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
      $c = new Criteria();
      $c->add(OcproespPeer::CODPRO,self::getCodpro());
      $reg = OcproespPeer::doSelectone($c);
      if ($reg)
      {
       $this->codtipesp=$reg->getCodtipesp();
       $c = new Criteria();
       $c->add(OctipespPeer::CODTIPESP,$this->codtipesp);
       $reg1 = OctipespPeer::doSelectone($c);
       if ($reg1){
        $this->destipesp=$reg1->getDestipesp();}
      }
      else { $this->codtipesp=''; $this->destipesp='';}
   }


 public function getNomram()
  {//JJSG
  return Herramientas::getX('Ramart','Caramart','Nomram',self::getCodram());
  }
  public function getDescta()
  {//JJSG
    return Herramientas::getX('Codcta','Contabb','Descta',self::getCodcta());
  }

  public function getDestiprec()
  {//JJSG
   return Herramientas::getX('CODTIPREC','Catiprec','Destiprec',self::getCodtiprec());
  }

  public function getDesctacodord()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getcodord());
  }

  public function getDesctacodpercon()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getcodpercon());
  }

  //public function getCodctasec()
  //{
  //  return Herramientas::getX('cedrif','opbenefi','codctasec',self::getrifpro());
  //}

  public function getDesctacodctasec()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getcodctasec());
  }

  public function getDesctacodordadi()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getcodordadi());
  }

  public function getDesctacodperconadi()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getcodperconadi());
  }

  public function getDesctacodordmercon()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getcodordmercon());
  }

  public function getDesctacodpermercon()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getcodpermercon());
  }

  public function getDesctacodordcontra()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getcodordcontra());
  }

  public function getDesctacodpercontra()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getcodpercontra());
  }

    public function getRecargo()
    {
    return $this->recargo;
    }

    public function setRecargo($val)
    {
      $this->recargo = $val;
    }

    public function getDestip()
  {
    return Herramientas::getX('codtip','Catipempsnc','destip',self::getcodtipemp());
  }

  public function getCodprogan()
  {
  return self::getCodpro();
  }

  public function getDespro()
  {
  return self::getNompro();
  }

  public function getDesban()
  {
    return Herramientas::getX('codban','cabanco','desban',self::getCodban());
  }

  public function getDestipcta()
  {
    return Herramientas::getX('codtip','tstipcue','destip',self::getCodtip());
  }

  public function getTiedatrel()
  {
  	$valor="N";
  	if (self::getId()){
  	  $d= new Criteria();
  	  $d->add(CacotizaPeer::CODPRO,self::getCodpro());
  	  $resul= CacotizaPeer::doSelectOne($d);
  	  if ($resul)
  	  {
  	  	$valor= 'S';
  	  }else {
  	  $d= new Criteria();
  	  $d->add(CaordcomPeer::CODPRO,self::getCodpro());
  	  $resul= CaordcomPeer::doSelectOne($d);
  	  if ($resul)
  	  {
  	  	$valor= 'S';
  	  }else $valor= 'N';
  	  }
  	}


  	return $valor;
  }

  public function setTiedatrel()
  {
  	return $this->tiedatrel;
  }

  public function getOculsave()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almregpro',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('oculsave',$varemp['aplicacion']['compras']['modulos']['almregpro']))
	       {
	       	$dato=$varemp['aplicacion']['compras']['modulos']['almregpro']['oculsave'];
	       }
         }
     return $dato;
  }

  public function setOculsave()
  {
  	return $this->oculsave;
  }

}
