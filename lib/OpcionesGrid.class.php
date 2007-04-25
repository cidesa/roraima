<?php

/**
 * Clase para el manejo de las Opciones del Grid
 *
 * @package    Siga
 * @subpackage lib
 * @author     Grupo Desarrollo Cidesa <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: $
 * @copyright  Copyright 2007, Cidesa C.A.
 * 
 */
class OpcionesGrid
{
	private $colums = array();
	private $eliminar = true;
	private $eliminar = 'Título';
	private $filas = 17;
	
			
	public function newColumn()
	{
		$colums[] = new Columna(); 
		
	}

    public function setEliminar($val){
    
    
      
      
	}

	public function setTitulo($val){
	  use_helper('I18N');
      $titulo = __($val);
    }
	
	public function setFilas($val) {$filas=$val;}
	
	
}

		//////////////////////
		//GRID
		$c = new Criteria();
		$c->add(CaartalmPeer::CODART,str_pad($this->caregart->getCodart(),20,' '));
		$per = CaartalmPeer::doSelect($c);
		
		//$filas=17;
		//$cabeza="Existencia";
		//$eliminar=true;
		//$titulos=array("Cod. Almacen","Descripción","Cod. Ubicacion","Ubicación","Exi. Mínima","Exi. Máxima","Exi. Actual","Reorden");
		//$anchos=array("10%","20%","10%","20%","10%","10%","10%","10%");
		//$alignf=array('center','left','center','left','right','right','right','right');
		//$alignt=array('center','left','center','left','right','right','right','right');
		//$campos=array('Codalm','Nomalm','Codubi','Nomubi','Eximin','Eximax','Exiact','Ptoreo');
		//$tipos=array('t','t','m','m','m','m'); //texto, monto, fecha --solo de los campos a grabar, no de todo el grid
		//$montos=array("5","6","7","8");
		//$totales=array("", "", "", "");
		$mascaraubicacion=$this->mascaraubicacion;
		//$html=array('type="text" size="5"','type="text" size="25" disabled=true','type="text" size="5"','type="text" size="25" disabled=true','type="text" size="10"','type="text" size="10"','type="text" size="10"','type="text" size="10"');
		//$js=array('','','onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraubicacion.chr(39).')"','','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"');
		//$grabar=array("1","3","5","6","7","8");
		//$filatotal='';
		
		$this->obj=array('cabeza'=>$cabeza, 'filas'=>$filas, 'eliminar'=>$eliminar, 'titulos'=>$titulos, 
		'anchos'=>$anchos, 'alignf'=>$alignf, 'alignt'=>$alignt, 'campos'=>$campos, 'tipos' => $tipos, 
		'montos'=>$montos, 'filatotal' => $filatotal, 'totales'=>$totales, 'html'=>$html, 'js'=>$js, 
		'datos'=>$per, 'grabar'=>$grabar);


class Columna
{
  CONST CENTRO = 'center';
  CONST IZQUIERDA = 'left';
  CONST DERECHA = 'right';
  
  CONST TEXTO = 't';
  CONST MONTO = 'm';
  
  
  
  private $titulo='';
  private $ancho='';
  private $alignf='';
  private $alignt='';
  private $field='';
  private $type='';
  private $isnumeric=false;
  private $istotal=false;
  private $js='';
  private $html = 'type="text" size="10"';
  private $save = false;
  private $objtotal = '';
  
  public function setTitulo($val){ // $titulos
      use_helper('I18N');
      self::$titulo = __($val);
	}
	
  public function setAncho($val){ // $anchos
	  $ancho = $val;
	}

  public function setAlingObject($val){ // $alignf
	  $alignf = $val;
	}

  public function setAlingContent($val){ // $alignt
	  $alignt = $val;
	}

  public function setFieldName($val){ // $campos
	  $field = ucfirst(strtolower($val));
	}
	
  public function setType($val){ // $tipos
	  $type = $val;
	}
	
  public function isNumeric($val){ // $montos
	  $isnumeric = $val; 
	}

  public function isTotal($val){ // $totales
	  $istotal = $val; 
	}
	
  public function setJScript($val){ // $js
	  $js = $val; 
	}

  public function setHTML($val){ // $html
	  $html = $val; 
	}

  public function isSave($val){ // $grabar
	  $save = $val; 
	}
	
  public function Columna(){ // Constructor
    
    }
  
	
}

?>