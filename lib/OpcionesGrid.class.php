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
	private $titulo = 'Título';
	private $filas = 10;
	
			
	public function newColumn()
	{
		$colums[] = new Columna(); 
		
	}

    public function setEliminar($val){

      if(is_bool($val)){
        $eliminar = $val;
      }
      
	}

	public function setTitulo($val){
	  use_helper('I18N');
      $titulo = __($val);
    }
	
	public function setFilas($val){
	  
	  if(is_int($val)){
	    $filas=$val;
	  }
	  
	}
	
	public function getConfig(){
	  
      foreach ($colums as $key => $col){

        //$filas=17;
		//$cabeza="Existencia";
		//$eliminar=true;

        $titulos[]  =    $col->getTitulo();
		$anchos[]   =    $col->getAncho();
		$alignf[]   =    $col->getAlineacionObjeto();
		$alignt[]   =    $col->getAlineacionContenido();
		$campos     =    $col->getNombreCampo();
		if($col->isGrabable()){
		  $t = $col->getTipo();
		  $tipos    =    $t; //texto, monto, fecha --solo de los campos a grabar, no de todo el grid
          if($t == Columna::MONTO){
            $montos =    $key+1;
			if($col->isTotal()){
			  $totales[] = $col->getTotal();
			  $filatotal[] = $col->getObjetoTotal();
			}else{
			  $totales[] = '';
			  $filatotal[] = '';
			}
			
          }		  
		}

		$html[]     =    $col->getHTML();
		$js[]       =    $col->getJScript();
		
		if($col->isGrabable()){
		  $grabar[] =    $key+1;
		}
		
		
		

		$obj=array('cabeza'=>self::$titulo, 'filas'=>self::$filas, 'eliminar'=>self::$eliminar, 'titulos'=>$titulos, 
		'anchos'=>$anchos, 'alignf'=>$alignf, 'alignt'=>$alignt, 'campos'=>$campos, 'tipos' => $tipos, 
		'montos'=>$montos, 'filatotal' => $filatotal, 'totales'=>$totales, 'html'=>$html, 'js'=>$js, 
		'datos'=>$per, 'grabar'=>$grabar);
        
      }
	}
	
}

class Columna
{
  CONST CENTRO = 'center';
  CONST IZQUIERDA = 'left';
  CONST DERECHA = 'right';
  
  CONST TEXTO = 't';
  CONST MONTO = 'm';
  CONST FECHA = 'f';
  
    
  private $titulo='';
  private $ancho='';
  private $alignf='';
  private $alignt='';
  private $field='';
  private $type='';
  private $isnumeric=false;
  private $istotal=false;
  private $objtotal='';
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

  public function setAlineacionObjecto($val){ // $alignf
	  $alignf = $val;
	}

  public function setAlineacionContenido($val){ // $alignt
	  $alignt = $val;
	}

  public function setNombreCampo($val){ // $campos
	  $field = ucfirst(strtolower($val));
	}
	
  public function seTipo($val){ // $tipos
	  $type = $val;
	}
	
  public function setEsNumerico($val){ // $montos
	  $isnumeric = $val; 
	}

  public function setEsTotal($val,$obj){ // $totales
	  $istotal = $val;
	  $objtotal = $obj;
	}
	
  public function setJScript($val){ // $js
	  $js = $val; 
	}

  public function setHTML($val){ // $html
	  $html = $val; 
	}

  public function setEsGrabable($val){ // $grabar
	  $save = $val; 
	}
	
  public function Columna(){ // Constructor
    
    }
  

  public function getTitulo(){ // $titulos
      return self::$titulo;
	}
	
  public function getAncho(){ // $anchos
	  return $ancho;
	}

  public function getAlineacionObjecto(){ // $alignf
	  return $alignf;
	}

  public function getAlingContent(){ // $alignt
	  return $alignt;
	}

  public function getNombreCampo(){ // $campos
	  return $field;
	}
	
  public function getTipo(){ // $tipos
	  return $type;
	}
	
  public function isNumerico(){ // $montos
	  return $isnumeric; 
	}

  public function isTotal(){ // $totales
	  return $istotal; 
	}
	
  public function getObjetoTotal(){ // $totales
	  return $objtotal; 
	}
	
  public function getJScript(){ // $js
	  return $js; 
	}

  public function getHTML(){ // $html
	  return $html; 
	}

  public function isGrabable(){ // $grabar
	  return $save; 
	}
	
    
    
}

?>