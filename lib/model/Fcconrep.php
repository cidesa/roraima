<?php

/**
 * Subclass for representing a row from the 'fcconrep'.
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
class Fcconrep extends BaseFcconrep
{
   protected $codpar1="";
   protected $rifrep="";
   protected $grid= array();
   public function getCodpar1()
   {
   	   $var=self::getCodpar()."-".self::getCodmun()."-".self::getCodedo()."-".self::getCodpai();
       return $var;
   }

   public function getNomconrep()
   {
      return Herramientas::getX('rifcon','fcconrep','nomcon',self::getRifcon());
   }

   public function getRifrep()
   {
      return self::getRifcon();
   }


}
