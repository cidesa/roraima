<?php

/**
 * Clase para el manejo de las columnas del grid
 *
 * @package    Siga
 * @subpackage lib
 * @author     Grupo Desarrollo Cidesa <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: $
 * @copyright  Copyright 2007, Cidesa C.A.
 * 
 */
class Columna
{
  CONST CENTRO = 'center';
  CONST IZQUIERDA = 'left';
  CONST DERECHA = 'right';
  
  CONST TEXTO = 't';
  CONST MONTO = 'm';
  CONST FECHA = 'f';
  
    
  private $titulo='';
  private $alignf='left';
  private $alignt='left';
  private $field='';
  private $type='';
  private $isnumeric=false;
  private $istotal=false;
  private $objtotal='';
  private $js='';
  private $html = 'type="text" size="10"';
  private $save = false;
  private $catalogoform = '';
  private $catalogoclass = '';
  private $catalogoobjadic = '';
  private $idfuncion = '';
  private $objmostrar = '';
  private $objcompletar= '';
  private $htmltotalfilas='';
  

  /**
   * Estable el nombre de la cabecera de la columna
   *  
   * @static
   * @param $val Nombre de la cabecera (string) 
   * @return bool
   */ 
  public function setTitulo($val){ // $titulos
      use_helper('I18N');
      self::$titulo = __($val);
	}
	
  /**
   * Estable la Alineación del objeto, puede ser las 
   * constantes CENTRO,IZQUIERDA o DERECHA.
   * Por defecto IZQUIERDA
   *  
   * @static
   * @param $val Alineación, ej. Columna::CENTRO 
   * @return bool
   */ 
  public function setAlineacionObjecto($val){ // $alignf
	  self::$alignf = $val;
	}

  /**
   * Estable la Alineación del contenido del objeto, puede ser las 
   * constantes CENTRO,IZQUIERDA o DERECHA
   * Por defecto IZQUIERDA
   *   
   * @static
   * @param $val Alineación, ej. Columna::CENTRO 
   * @return bool
   */ 
  public function setAlineacionContenido($val){ // $alignt
	  self::$alignt = $val;
	}

  public function setNombreCampo($val){ // $campos
	  self::$field = ucfirst(strtolower($val));
	}
	
  public function seTipo($val){ // $tipos
	  self::$type = $val;
	}
	
  public function setEsNumerico($val){ // $montos
	  self::$isnumeric = $val; 
	}

  public function setEsTotal($val,$obj=''){ // $totales
	  self::$istotal = (bool)$val;
	  self::$objtotal = $obj;
	}
	
  public function setJScript($val){ // $js
	  self::$js = $val; 
	}

  public function setHTML($val){ // $html
	  self::$html = $val; 
	}

  public function setEsGrabable($val){ // $grabar
	  self::$save = (bool)$val; 
	}
	
  public function setCatalogo($clase,$form,$objadic=''){
    
    self::$catalogoform = $form;
    self::$catalogoclass = $clase;
    self::$catalogoobjadic = $objadic;
    
  }

  public function setAjax($idFunc,$objmost){
    
    self::$idfuncion = (int)$idFunc;
    self::$objmostrar = (int)$objmost;
    //self::$objcompletar= $objcompl;
    
  }
  
 
  public function Columna($name){ // Constructor ****************  
    self::setTitulo($name);  
    
    
    }
  

  public function getTitulo(){ // $titulos
      return self::$titulo;
	}
	
  public function getAlineacionObjecto(){ // $alignf
	  return self::$alignf;
	}

  public function getAlingContent(){ // $alignt
	  return self::$alignt;
	}

  public function getNombreCampo(){ // $campos
	  return self::$field;
	}
	
  public function getTipo(){ // $tipos
	  return self::$type;
	}
	
  public function isNumerico(){ // $montos
	  return self::$isnumeric; 
	}

  public function isTotal(){ // $totales
	  return self::$istotal; 
	}
	
  public function getObjetoTotal(){ // $totales
	  return self::$objtotal; 
	}
	
  public function getJScript(){ // $js
	  return self::$js; 
	}

  public function getHTML(){ // $html
	  return self::$html; 
	}

  public function isGrabable(){ // $grabar
	  return self::$save; 
	}
	
  public function getCatalogo($pos='#'){ // $grabar

      if(self::$catalogoobjadic)
        return ucfirst(strtolower(self::$catalogoclass)).'-'.self::$catalogoform.'-x'.$pos.'-x'.self::$catalogoobjadic;
      else return ucfirst(strtolower(self::$catalogoclass)).'-'.self::$catalogoform.'-x'.$pos;
       
	}
	
  public function getAjax($objcompl='#'){
    
    return (string)self::$idfuncion.'-x'.(string)self::$objmostrar.'-x'.$objcompl; 
    
  }
      
}

?>