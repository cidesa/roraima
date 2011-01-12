<?php

/**
 * Subclass for representing a row from the 'casolart'.
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
class Casolart extends BaseCasolart
{
  private $tipo = '';
  protected $actsolegr = '';
  protected $articulo = '';
  protected $modifico= '';
  protected $check= '';
  protected $obj = array();
  protected $etiqueta="";
  protected $porcostart='';
  protected $pormoncot='';
  protected $precom="";
  protected $cambiareti="";
  protected $nometifor="";
  protected $portimeent='';
  protected $porprovee="";
  protected $observaciones="";

  public function getMonreq($val=false)
  {
	return parent::getMonreq(true);
  }

  public function getNomcat()
  {
    $catbnubica="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almsolegr',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('catbnubica',$varemp['aplicacion']['compras']['modulos']['almsolegr']))
	       {
	       	$catbnubica=$varemp['aplicacion']['compras']['modulos']['almsolegr']['catbnubica'];
	       }
         }

  	if ($catbnubica=='S')
  	 return Herramientas::getX('CODUBI','Bnubica','Desubi',self::getUnires());
  	else
	return Herramientas::getX('CODCAT','Npcatpre','Nomcat',self::getUnires());
  }

  public function getNomext()
  {
	return Herramientas::getX('CODFIN','Fortipfin','Nomext',self::getTipfin());
  }

  public function setTipo($val)
  {
	$this->tipo = $val;
  }

  public function getTipo()
  {
	return $this->tipo;
  }

  public function getMondes($val=false)
  {
	return parent::getMondes(true);
  }

  public function getEtiqueta()
  {
  	if (self::getStareq()=='A')
  	{
      $reqapr=H::getX_vacio('Codemp','Cadefart','Prcreqapr','001');
  	  $d= new Criteria();
  	  $d->add(CpprecomPeer::REFPRC,self::getReqart());
  	  $resul= CpprecomPeer::doSelectOne($d);
  	  if ($resul)
  	  {
        if ($reqapr=='S') $eti="SOLICITUD APROBADA";
        else $eti="";
  	  	  $z= new Criteria();
	  	  $z->add(CaordcomPeer::REFSOL,self::getReqart());
	  	  $z->add(CaordcomPeer::STAORD,'N',Criteria::NOT_EQUAL);
	  	  $resul2= CaordcomPeer::doSelectOne($z);
	  	  if ($resul2)
	  	  {
            $eti="LA SOLICITUD TIENE ASOCIADA UNA ORDEN DE COMPRA N° ".$resul2->getOrdcom()." DE FECHA ".date('d/m/Y',strtotime($resul2->getFecord()));
	  	  }
  	  }else
  	  {
  	  	if ($reqapr=='S') $eti="SOLICITUD NO APROBADA";
  	  	else $eti="";
  	  }
  	}
  	else if (self::getStareq()=='N')
  	{
  	  $eti="SOLICITUD ANULADA";
  	}
  	else
  	{
  	 $eti="";
  	}
  	return $eti;
  }

  public function getPrecom()
  {
  	  $d= new Criteria();
  	  $d->add(CpprecomPeer::REFPRC,self::getReqart());
  	  $resul= CpprecomPeer::doSelectOne($d);
  	  if ($resul)
  	  {
  	  	return 'S';
  	  }else return 'N';
  }

  public function setPrecom()
  {
  	return $this->precom;
  }

    public function getCambiareti()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almaprsolegr',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('cambiareti',$varemp['aplicacion']['compras']['modulos']['almaprsolegr']))
	       {
	       	$dato=$varemp['aplicacion']['compras']['modulos']['almaprsolegr']['cambiareti'];
	       }
         }
     return $dato;
  }

  public function setCambiareti()
  {
  	return $this->cambiareti;
  }

  public function getNometifor()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almaprsolegr',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('nometifor',$varemp['aplicacion']['compras']['modulos']['almaprsolegr']))
	       {
	       	$dato=$varemp['aplicacion']['compras']['modulos']['almaprsolegr']['nometifor'];
	       }
         }
     return $dato;
  }

  public function setNometifor()
  {
  	return $this->nometifor;
  }

  public function getDescen()
  {
	return Herramientas::getX('CODCEN','Cadefcen','Descen',self::getCodcen());
  }

}
