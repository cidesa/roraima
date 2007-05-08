<?php

/**
 * oycdesobr actions.
 *
 * @package    siga
 * @subpackage oycdesobr
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdesobrActions extends autooycdesobrActions
{
	public function configGrid()
	{
       
       $per = array();
	  
		$filas=5;
		$cabeza="Ingenieros Residentes";
		$eliminar=true;
		$titulos=array("Cédula","Nombre","Nro. C.I.V.");
		$ancho="1100";
		$alignf=array('left','left','left');
		$alignt=array('left','left','left');
		$campos=array('','','');
		$catalogos=array('','','');
		$ajax=array('','',''); //parametro-cajitamostrar-autocompletar
		$tipos=array('t','t','t'); //texto, monto, fecha --solo de los campos a grabar, no de todo el grid
		$montos=array("","","");
		$totales=array("","","");
		$html=array('','','');
		$js=array('','','');
		$grabar=array("1","2","3");
		$filatotal='';
		 
		
		$this->obj=array('cabeza'=>$cabeza, 'filas'=>$filas, 'eliminar'=>$eliminar, 'titulos'=>$titulos, 
		'ancho'=>$ancho, 'alignf'=>$alignf, 'alignt'=>$alignt, 'campos'=>$campos, 'catalogos' => $catalogos, 
		'ajax' => $ajax, 'tipos' => $tipos, 'montos'=>$montos, 'filatotal' => $filatotal, 'totales'=>$totales, 
		'html'=>$html, 'js'=>$js, 'datos'=>$per, 'grabar'=>$grabar, 'tabla' => 'Caartalm');
		////////////////////// 
	  
	}
}
