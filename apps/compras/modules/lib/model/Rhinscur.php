<?php

/**
 * Subclass for representing a row from the 'rhinscur'.
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
class Rhinscur extends BaseRhinscur
{
	protected $obj_percur=array();
	protected $asicla="";
	protected $notcur="";
	
	public function getDescur()
	{
		return H::getX('Codcur','Rhdefcur','Descur',$this->codcur);
	}
	public function getFecini()
	{
		$fecha = H::getX('Codcur','Rhdefcur','Fecini',$this->codcur);
		if($fecha)
			return date("d/m/Y",strtotime($fecha));
		else	
			return '';	
	}
	public function getFecfin()
	{
		$fecha = H::getX('Codcur','Rhdefcur','Fecini',$this->codcur);
		if($fecha)
			return date("d/m/Y",strtotime($fecha));
		else
			return '';	
	}
	public function getDurcur()
	{
		return H::FormatoMonto(H::getX('Codcur','Rhdefcur','Durcur',$this->codcur));
	}
	public function getTurcur()
	{
		$turno = H::getX('Codcur','Rhdefcur','Turcur',$this->codcur);
		if($turno)
			return $turno=='D' ? 'Diurno' : 'Nocturno' ;
		else	
			return '';	
	}
	public function getNomemp()
	{
		return H::GetX('Codemp','Nphojint','Nomemp',$this->codemp);
	}
	public function getNomcar()
	{
		return H::GetX('Codcar','Npcargos','Nomcar',$this->codcar);
	}
	public function getTipo()
	{
		return $this->tipper=='I' ? 'INTERNO' : 'EXTERNO';
	}
	/*public function setAsicla()
	{
		return $this->asicla;
	}
	public function getAsicla()
	{
		$asistio = H::GetX_vacio('Codemp','Rhasicur','Codemp',$this->codemp);
		return $asistio!='' ? 1 : null;
	}*/
}
