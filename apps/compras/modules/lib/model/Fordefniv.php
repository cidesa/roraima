<?php

/**
 * Subclass for representing a row from the 'fordefniv'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fordefniv.php 39727 2010-07-27 16:35:05Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fordefniv extends BaseFordefniv
{
  protected $objniv=array();
  protected $gridper=array();
  private $nomemp = '';
  protected $defcod="";

    public function getNomemp()
    {
        return  H::getX('Codemp','Empresa','Nomemp',self::getCodemp());
    }

    public function getDefcod()
    {
        $reg=FordeftitPeer::doSelect(new Criteria());
          if ($reg)
              return $this->defcod='S';
           else  return  $this->defcod='N';
    }
}

