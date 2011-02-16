<?php

/**
 * Subclase para representar una fila de la tabla 'liprebas'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Liprebas extends BaseLiprebas
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
            $eti="PRESUPUESTO APROBADA";
  	}
  	else if (self::getStareq()=='N')
  	{
  	  $eti="PRESUPUESTO ANULADA";
  	}
  	else
  	{
  	 $eti="PRESUPUESTO POR APROBAR";
  	}
  	return $eti;
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
