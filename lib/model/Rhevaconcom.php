<?php

/**
 * Subclass for representing a row from the 'rhevaconcom'.
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
class Rhevaconcom extends BaseRhevaconcom
{
   protected $codemp='';
   protected $nomemp='';	
   protected $obj_valniv=array();
   
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
   public function getDesvalins()
   {
   	  return H::GetX('Codvalins','Rhdefvalins','Desvalins',$this->codvalins);
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
}
