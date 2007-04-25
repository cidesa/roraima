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
  private $ancho = 0;
  private $filas = 10;
  private $htmltotalfilas = '';
  private $tabla ='';
	
			
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
	
  public function setHTMLTotalFilas($val){
    
    self::$htmltotalfilas = $val;
    
  }

  public function setTabla($val){
    
    self::$tabla = $val;
    
  }
  
  
  public function getConfig(){
	  
    foreach ($colums as $key => $col){

      $titulos[]  =    $col->getTitulo();
      $anchos[]   =    (string)self::$ancho;
      $alignf[]   =    $col->getAlineacionObjeto();
      $alignt[]   =    $col->getAlineacionContenido();
      $campos[]   =    $col->getNombreCampo();
	  if($col->isGrabable()){
	    $t = $col->getTipo();
	    $tipos    =    $t; //texto, monto, fecha --solo de los campos a grabar, no de todo el grid
        if($t == Columna::MONTO){
            $montos =    (string)($key+1);
		  if($col->isTotal()){
		    $objtotal = $col->getObjetoTotal();
		    if($objtotal==''){
		      $objtotal = 'total'.(string)($key+1);
		    }
		    $totales[] = $objtotal;
		  }else{
		    $totales[] = '';
		    $filatotal[] = '';
		  }
        }		  
	  }

      $html[]     =    $col->getHTML();
      $js[]       =    $col->getJScript();
      $catalogos[]=    $col->getCatalogo((string)($key+1));// por todas las columnas, si no tiene, se coloca vacio
      $ajax[]     =    $col->getAjax((string)($key+1));
	
      if($col->isGrabable()){
	    $grabar[] =    (string)($key+1);
	  }
	
	  $htmlfilatotal = '<input class="grid_txtright" type="text" id="total'.($key+1).'" name="total" size="25">';

					//$filas=17;
					//$cabeza="Existencia por Almacenes";
					//$eliminar=true;
					//$titulos=array("Cod. Almacen","Descripción","Cod. Ubicacion","Ubicación","Exi. Mínima","Exi. Máxima","Exi. Actual","Reorden");
					//$anchos=array("30%","20%","10%","20%","5%","5%","5%","5%");
					//$alignf=array('center','left','center','left','right','right','right','right');
					//$alignt=array('center','left','center','l0eft','right','right','right','right');
					//$campos=array('Codalm','Nomalm','Codubi','Nomubi','Eximin','Eximax','Exiact','Ptoreo');
					//$catalogos=array('Cadefalm-sf_admin_edit_form-x1-x2','','Cadefubi-sf_admin_edit_form-x3-x4','','','','','');// por todas las columnas, si no tiene, se coloca vacio
					//$ajax=array('2-x2-x1','','3-x4-x3','','','','',''); //parametro-cajitamostrar-autocompletar
					//$tipos=array('t','t','m','m','m','m'); //texto, monto, fecha --solo de los campos a grabar, no de todo el grid
					//$montos=array("5","6","7","8");
					//$totales=array("", "", "caregart_exitot", "");
					//$html=array('type="text" size="5"','type="text" size="25" disabled=true','type="text" size="5"','type="text" size="25" disabled=true','type="text" size="10"','type="text" size="10"','type="text" size="10"','type="text" size="10"');
					//$js=array('','','onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraubicacion.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"','','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"');
					//$grabar=array("1","3","5","6","7","8");
					//$filatotal='';
      
    } //foreach
    if(self::$htmltotalfilas ==''){
	    $filatotal = '<table>
						<tr>
							<th width="72%">
							</th>
							<th width="28%">
								'.implode('',$htmlfilatotal).'
							</th>
				   		</tr>
					</table>';
    }else {$filatotal=self::$htmltotalfilas;}
     
    $obj=array('cabeza'=>self::$titulo, 'filas'=>self::$filas, 'eliminar'=>self::$eliminar, 'titulos'=>$titulos, 
	'anchos'=>$anchos, 'alignf'=>$alignf, 'alignt'=>$alignt, 'campos'=>$campos, 'catalogos' => $catalogos, 
	'ajax' => $ajax, 'tipos' => $tipos, 'montos'=>$montos, 'filatotal' => $filatotal, 'totales'=>$totales, 
	'html'=>$html, 'js'=>$js, 'datos'=>$per, 'grabar'=>$grabar, 'tabla' => self::$tabla);
      
      
	}
	
}



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
  private $catalogoform = '';
  private $catalogoclass = '';
  private $catalogoobjadic = '';
  private $idfuncion = '';
  private $objmostrar = '';
  private $objcompletar= '';
  private $htmltoatlfilas='';
  
  public function setTitulo($val){ // $titulos
      use_helper('I18N');
      self::$titulo = __($val);
	}
	
  public function setAlineacionObjecto($val){ // $alignf
	  self::$alignf = $val;
	}

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
  
 
  public function Columna(){ // Constructor ****************  
    
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