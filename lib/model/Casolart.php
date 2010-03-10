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

  public function getMonreq($val=false)
  {
	return parent::getMonreq(true);
  }

  public function getNomcat()
  {
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

}
