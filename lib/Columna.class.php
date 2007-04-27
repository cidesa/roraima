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
  private $catalogoobjadic = 0;
  private $idfuncion = '';
  private $objmostrar = '';
  private $objcompletar= '';
  private $htmltotalfilas='';

  /**
   * Estable el nombre de la cabecera de la columna
   *  
   * @param $val (string) Nombre de la cabecera 
   * @return void
   */ 
  public function setTitulo($val){ // $titulos
        
      $this->titulo = $val;
      
    }
	
  /**
   * Estable la Alineación del objeto, puede ser las 
   * constantes CENTRO,IZQUIERDA o DERECHA.
   * Por defecto IZQUIERDA
   *  
   * @param $val (string) Alineación, ej. Columna::CENTRO 
   * @return void
   */ 
  public function setAlineacionObjeto($val){ // $alignf
	  $this->alignf = $val;
	}

  /**
   * Estable la Alineación del contenido del objeto, puede ser las 
   * constantes CENTRO,IZQUIERDA o DERECHA
   * Por defecto IZQUIERDA
   *   
   * @param $val (string) Alineación, ej. Columna::CENTRO 
   * @return void
   */ 
  public function setAlineacionContenido($val){ // $alignt
	  $this->alignt = $val;
	}

  /**
   * Estable el nombre del campo en la tabla que
   * contiene los datos del campo.  
   *   
   * @param $val (string) Nombre del Campo en la BD 
   * @return void
   */ 
  public function setNombreCampo($val){ // $campos
	  $this->field = ucfirst(strtolower($val));
	}
	
  /**
   * Estable el tipo de objeto que es la columna
   * ej.   TEXTO, MONTO o FECHA
   *   
   * @param $val (string) Tipo de Objeto Columna::TEXTO 
   * @return void
   */ 
  public function setTipo($val){ // $tipos
	  $this->type = $val;
	}
	
  /**
   * Estable si la columna es numérica o no
   *   
   * @param $val (bool) true/false 
   * @return void
   */ 
  public function setEsNumerico($val){ // $montos
	  $this->isnumeric = (bool)$val; 
	}

  /**
   * Estable si la columna numérica debe ser totalizada,
   * y el objeto que contendrá el valor
   *   
   * @param $val (bool) true/false 
   * @param $obj Nombre del Objeto Html donde se colocara el resultado de la totalización (string) 
   * @return void
   */ 	
  public function setEsTotal($val,$obj=''){ // $totales
	  $this->istotal = (bool)$val;
	  $this->objtotal = $obj;
	}
	
  /**
   * Estable el código JS que se colocará en cada objeto de la columna
   *   
   * @param $val (string) Código JS 
   * @return void
   */ 	
  public function setJScript($val){ // $js
	  $this->js = $val; 
	}

  /**
   * Estable el código HTML adicional a ser insertado en los
   * objetos de la columna 
   *   
   * @param $val (string) Código HTML 
   * @return void
   */ 	
  public function setHTML($val){ // $html
	  $this->html = $val; 
	}

  /**
   * Estable si los objetos de la columa deben ser guardados
   *   
   * @param $val (bool) true/false 
   * @return void
   */ 	
  public function setEsGrabable($val){ // $grabar
	  $this->save = (bool)$val; 
	}
	
  /**
   * Estable si los objetos de la columna tendrán un catálogo
   * para busqueda rápida de datos
   *   
   * @param $clase (string) Nombre de la tabla/clase de donde se genera el catalogo
   * @param $form (string) Objeto html form donde estan los objetos a actualizar por el catálogo
   * @param $objadic (string) Objeto donde se colcorá la información adicional del catálogo 
   * @return void
   */ 	
  public function setCatalogo($clase,$form,$objadic=0){
    
    $this->catalogoform = $form;
    $this->catalogoclass = $clase;
    $this->catalogoobjadic = (int)$objadic;
    
  }
  
  /**
   * Estable si los objetos de la columa deben ser guardados
   *   
   * @param $idFunc (int) Identificador del codigo a ejecutar (con respecto a la función executeAjax())
   * @param $objmost (int) Indice del objeto donde se mostrar la informacion adicional 
   * @return void
   */ 	
  public function setAjax($idFunc,$objmost){
    
    $this->idfuncion = (int)$idFunc;
    $this->objmostrar = (int)$objmost;
    //$this->objcompletar= $objcompl;
    
  }
  
 
  /**
   * Constructor de la columna
   *   
   * @param $val (string) Título de la columna 
   * @return void
   */ 	
  public function Columna($name){ // Constructor ****************  
    self::setTitulo($name);  
    
    }
  

  /**
   * Obtiene el Título de la columna
   *   
   * @return string
   */ 	
  public function getTitulo(){ // $titulos
      return $this->titulo;
	}
	
  /**
   * Obtiene la alineación del Objeto
   *   
   * @return string
   */ 	
  public function getAlineacionObjeto(){ // $alignf
	  return $this->alignf;
	}

  /**
   * Obtiene La alineación del contenido del objeto
   *   
   * @return string
   */ 	
  public function getAlineacionContenido(){ // $alignt
	  return $this->alignt;
	}

  /**
   * Obtiene el nombre del campo en la tabla a la que hace referencia
   *   
   * @return string
   */ 	
  public function getNombreCampo(){ // $campos
	  return $this->field;
	}
	
  /**
   * Obtiene el tipo de objeto que contendra la columna
   *   
   * @return string
   */ 	
  public function getTipo(){ // $tipos
	  return $this->type;
	}
	
  /**
   * Indica si la columna es o no numérica
   *   
   * @return bool
   */ 	
  public function isNumerico(){ // $montos
	  return $this->isnumeric; 
	}

  /**
   * Indica si la columan debe ser totalizada
   *   
   * @return bool
   */ 	
  public function isTotal(){ // $totales
	  return $this->istotal; 
	}
	
  /**
   * Obtiene el Objeto donde se colcará el resultado de la totalización de la columna  
   *   
   * @return string
   */ 	
  public function getObjetoTotal(){ // $totales
	  return $this->objtotal; 
	}
	
  /**
   * Obtiene el código JavaScript que se insertará en los objetos de la columna
   *   
   * @return string
   */ 	
  public function getJScript(){ // $js
	  return $this->js; 
	}

  /**
   * Obtiene el código HTML que se insertará en los objetos de la columna
   *   
   * @return string
   */ 	
  public function getHTML(){ // $html
	  return $this->html; 
	}

  /**
   * Indica si los objetos de la columan deben tomados en cuenta para
   * ser guardados en la base de datos.
   *   
   * @return bool
   */ 	
  public function isGrabable(){ // $grabar
	  return $this->save; 
	}
	
  /**
   * Obtiene La codificación para insertar una busqueda por catálogo
   * en los objetos de la columna 
   * 
   * @param $pos (int) Posicion de la columna donde se colocará el dato adicional
   * @return string
   */ 	
  public function getCatalogo($pos='#'){ // $grabar

    if($this->catalogoclass!='' && $this->catalogoform!=''){
      if($this->catalogoobjadic!=0)
        return ucfirst(strtolower($this->catalogoclass)).'-'.$this->catalogoform.'-x'.$pos.'-x'.(string)$this->catalogoobjadic;
      else return ucfirst(strtolower($this->catalogoclass)).'-'.$this->catalogoform.'-x'.$pos;
    }

  }
	
  /**
   * Obtiene La codificación para hacer el llamado a una funcion AJAX
   * en los objetos de la columna 
   *    
   * @return string
   */ 	
  public function getAjax($objcompl='#'){
    
    return (string)$this->idfuncion.'-x'.(string)$this->objmostrar.'-x'.$objcompl; 
    
  }
      
}

?>