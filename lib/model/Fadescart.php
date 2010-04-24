<?php

/**
 * Subclass for representing a row from the 'fadescart'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fadescart.php 33699 2009-10-01 22:15:36Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fadescart extends BaseFadescart
{
  protected $desdesc="";
  protected $codcta="";
  protected $cantidad="0,00";
  protected $montdesc="0,00";
  protected $tipdesc="";
  protected $tipret="";

  public function getDesdesc()
  {
   return Herramientas::getX('CODDESC','Fadescto','Desdesc',self::getCoddesc());
  }

  public function getCodcta()
  {
   return Herramientas::getX('CODDESC','Fadescto','Codcta',self::getCoddesc());
  }

  public function getTipret()
  {
   return Herramientas::getX('CODDESC','Fadescto','Tipret',self::getCoddesc());
  }

  public function getTipdesc()
  {
   return Herramientas::getX('CODDESC','Fadescto','Tipdesc',self::getCoddesc());
  }

  public function getMontdesc()
  {
   return Herramientas::getX('CODDESC','Fadescto','Mondesc',self::getCoddesc());
  }
}
