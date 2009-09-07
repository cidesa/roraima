<?php

/**
 * Subclass for representing a row from the 'cobdettra'.
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
class Cobdettra extends BaseCobdettra
{
  protected $fecemi="";
  protected $fecven="";
  protected $recargos="";
  protected $descuentos="";
  protected $montotalformato="0,00";
  protected $saldoc="0,00";
  protected $monpagado="0,00";
  protected $marca="";
  protected $btnrec="";
  protected $btndes="";


    public function afterHydrate()
  {
    $c=new Criteria();
	$c->add(CobdocumePeer::REFDOC,self::getRefdoc());
	$documentos = CobdocumePeer::doSelectOne($c);
    if($documentos)
    {
    $this->saldoc=number_format($documentos->getSaldoc(),2,',','.');
    $this->montotal= $documentos->getMondoc() + $documentos->getRecdoc() - $documentos->getDscdoc();
    $this->monpagado=number_format($documentos->getAbodoc(),2,',','.');
    $this->montotalformato=number_format($this->montotal,2,',','.');
    }

  }

  public function getFecemi(){

    $fec=date('d/m/Y',strtotime(Herramientas::getX('REFDOC','Cobdocume','Fecemi',self::getRefdoc())));
     return $fec;
  }

  public function getFecven(){
     $fec=date('d/m/Y',strtotime(Herramientas::getX('REFDOC','Cobdocume','Fecven',self::getRefdoc())));
     return $fec;
  }


}
