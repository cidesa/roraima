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
  public $colums = array();
  private $eliminar = true;
  private $titulo = 'Título';
  private $ancho = 1000;
  private $filas = 10;
  private $htmltotalfilas = '';
  private $tabla ='';
	
  /**
   * Crea una nueva columna dentro del objeto de opciones
   * Esta columna contiene los datos de configuracion
   * Cada columna nueva contiene informacion predeterminada
   *  
   * @param $name Titulo de la nueva columna
   * @return bool 
   */ 
  public function newColumna($name='')
  {
      $this->colums[] = new Columna($obj);      
          
  }

  /**
   * Crea una nueva columna dentro del objeto de opciones
   * Esta columna contiene los datos de configuracion
   * Cada columna nueva contiene informacion predeterminada
   *  
   * @param $obj Objeto Columna
   * @return bool 
   */ 
  public function addColumna($obj)
  {
    if($obj instanceof Columna){
      $this->colums[] = $obj;
    }
  }
  
  /**
   * Establece si se coloca el icono de eliminar en cada fila 
   *  
   * @param $val (bool) true/false
   * @return bool
   */ 
  public function setEliminar($val){

    if(is_bool($val)){
      $eliminar = $val;
    }
       
  }

  /**
   * Establece el título del Grid 
   *  
   * @param $val (string) Título del Grid 
   * @return bool
   */ 
  public function setTitulo($val){
    //use_helper('I18N');
    $this->titulo = $val;
  }

  /**
   * Establece el Nro de filas adicionales para insertar
   * nuevos datos en el grid. Por defecto 15
   *  
   * @param $val (int) Cantidad de fila nuevas 
   * @return bool
   */ 
  public function setFilas($val){
  
    if(is_int($val)){
      $filas=$val;
    }
  }

  /**
   * Establece el código HTML que se colocará al final del grid para
   * generar los objetos con los totales
   *  
   * @param $val (string) Código HTML a ser introducido al final de grid 
   * @return bool
   */ 
  public function setHTMLTotalFilas($val){
    
    $this->htmltotalfilas = $val;
    
  }

  /**
   * Establece la tabla de la cual se traen los datos del grid
   *  
   * @param $val (string) Nombre de la Tabla/Clase  
   * @return bool
   */ 
  public function setTabla($val){
    
    $this->tabla = ucfirst(strtolower($val));
    
  }

  /**
   * Estable el ancho total del Grid
   *  
   * @param $val (string) Nombre de la Tabla/Clase  
   * @return bool
   */ 
  public function setAnchoGrid($val){
    
    $this->ancho = (int)$val;
    
  }
  
  
  /**
   * Genera el arreglo de configuracion que será enviado al GridHelper
   * 
   * @param $per (object) Arreglo de objetos/registros
   * @return array
   */ 
  public function getConfig($per){
	$htmlfilatotal = array();;
    $titulos   =    array();
    $ancho    =    (string)$this->ancho;
    $alignf    =    array();
    $alignt    =    array();
    $campos    =    array();
    $totales   =    array();
    $filatotal =    array();
    $grabar    =    array();
    $html      =    array();
    $js        =    array();
    $catalogos =    array();// por todas las columnas, si no tiene, se coloca vacio
    $ajax      =    array();
    $tipos     =    array();
    $montos     =    array();

    foreach ($this->colums as $key => $col){

      $titulos[]  =    $col->getTitulo();
      $alignf[]   =    $col->getAlineacionObjeto();
      $alignt[]   =    $col->getAlineacionContenido();
      $campos[]   =    $col->getNombreCampo();
	  if($col->isGrabable()){
	    $t = $col->getTipo();
	    $tipos[]    =    $t; //texto, monto, fecha --solo de los campos a grabar, no de todo el grid
        if($t == Columna::MONTO){
            $montos[] =    (string)($key+1);
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
        $grabar[] =    (string)($key+1);		  
	  }

      $html[]     =    $col->getHTML();
      $js[]       =    $col->getJScript();
      $catalogos[]=    $col->getCatalogo((string)($key+1));// por todas las columnas, si no tiene, se coloca vacio
      $ajax[]     =    $col->getAjax((string)($key+1));
	
	  $htmlfilatotal[] = '<input class="grid_txtright" type="text" id="total'.($key+1).'" name="total" size="25">';

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
    if($this->htmltotalfilas ==''){
	    $filatotal = '<table>
						<tr>
							<th width="72%">
							</th>
							<th width="28%">
								'.implode(' ',$htmlfilatotal).'
							</th>
				   		</tr>
					</table>';
    }else {$filatotal=$this->htmltotalfilas;}

    
    
    $obj=array('cabeza'=> $this->titulo, 'filas'=> $this->filas, 'eliminar'=> $this->eliminar, 'titulos'=> $titulos, 
	'ancho'=> $ancho, 'alignf'=> $alignf, 'alignt'=> $alignt, 'campos'=> $campos, 'catalogos' => $catalogos, 
	'ajax' => $ajax, 'tipos' => $tipos, 'montos'=> $montos, 'filatotal' => $filatotal, 'totales'=> $totales, 
	'html'=> $html, 'js'=> $js, 'datos'=> $per, 'grabar'=> $grabar, 'tabla' => $this->tabla);
    
    //print $filatotal;

    return $obj;
    
	}
	
}

?>