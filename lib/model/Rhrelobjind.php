<?php

/**
 * Subclass for representing a row from the 'rhrelobjind'.
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
class Rhrelobjind extends BaseRhrelobjind
{
   protected $codemp='';
   protected $nomemp='';	
   protected $obj_objind=array();
   
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
   public function getDesind()
   {
   	  return H::GetX('Codind','Rhdefind','Desind',$this->codind);
   }
}
