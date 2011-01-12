<?php

/**
 * Subclass for representing a row from the 'rhevaempobj'.
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
class Rhevaempobj extends BaseRhevaempobj
{
   protected $codemp='';
   protected $nomemp='';	
   protected $obj_empobj=array();
   
   public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
      $this->codemp=self::getCodevdo();
   }
   public function setCodemp($v)
   {
   	   $this->codemp=$v;
	   $this->codevdo=$v;
   }
   public function getNomemp()
   {
   	  return H::GetX('Codemp','Nphojint','Nomemp',self::getCodevdo());
   }
   public function getDesniv()
   {
   	  return H::GetX('Codniv','Rhdefniv','Desniv',$this->codniv);
   }
   public function getDesobj()
   {
   	  return H::GetX('Codobj','Rhdefobj','Desobj',$this->codobj);
   }   
   public function getMinpun()
   {
   	  return H::GetX('Codniv','Rhdefniv','Minpun',$this->codniv);
   }
   public function getMaxpun()
   {
   	  return H::GetX('Codniv','Rhdefniv','Maxpun',$this->codniv);
   }
   public function getTipcal()
   {
   	  return H::GetX('Codniv','Rhdefniv','Tipcal',$this->codniv);
   }
   public function getPoralc()
   {
   	  return ((floatval(self::getAlcobj())*100)/floatval(self::getPlaobj()));
   }
   public function getPesxpun()
   {
   	  return floatval(self::getPesobj())*floatval(self::getPunobj());
   }
}
