<?php

/**
 * Subclase para representar una fila de la tabla 'dfatendoc'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.documentos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Dfatendoc extends BaseDfatendoc
{
  protected $tipdoc = '';
  protected $objitems = '';
  protected $check = false;

  public function afterHydrate(){

    $dftabtip = $this->getDftabtip();
    $this->tipdoc = $dftabtip->getTipdoc();

  }

  public function getAnuate()
  {
    
    $lista = Constantes::listaEstadoDocumento();
    $ret = $lista[$this->anuate];
    
    if($ret==$lista['1']) return "<font color=\"#FF0000\">$ret</font>";
    else return "<font color=\"#000080\">$ret</font>";

  }

  public function getStaate()
  {

    $lista = Constantes::listaAtencion();

    if(parent::getStaate()=="") return "";
    else  return $lista[parent::getStaate()];

  }




}
