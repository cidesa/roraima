<?php

/**
 * Subclass for representing a row from the 'cadefalm'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cadefalm.php 42487 2011-02-11 04:27:15Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cadefalm extends BaseCadefalm
{


  public function getNomcat(){
     return Herramientas::getX('codubi','Bnubibie','Desubi',self::getCodcat());
  }

  public function setCodalm($v){

    parent::setCodalm(str_pad($v, 6 , "0", STR_PAD_LEFT));

  }

 protected $check = 0;


  public function getNomtip(){
     return Herramientas::getX('id','Catipalm','Nomtip',self::getCodtip());
  }

  public function getCodlongveinte()
  {
     return H::getConfApp('codlongveinte', 'compras', 'almdefalm');
  }

}
