<?php

/**
 * OpcionesGrid: Clase para el manejo de las opciones del grid.
 *
 * @package    Roraima
 * @subpackage lib
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class OpcionesGrid
{
  public $colums = array();
  private $eliminar = true;
  private $titulo = 'Título';
  private $name = 'a';
  private $ancho = 1000;
  private $filas = 10;
  private $htmltotalfilas = '';
  private $tabla ='';
  private $jseliminar ='';

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
   * @param $function (string) nombre de la función a ajecutar en cada botón eliminar
   * @return bool
   */
  public function setEliminar($val, $jseliminar = ''){

    if(is_bool($val)){
      $this->eliminar = $val;
    }
    $this->jseliminar = $jseliminar;

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
   * Establece el prefijo de las cajas de textos
   *
   * @param $val (string) prefijo de las cajas de textos
   * @return bool
   */
  public function setName($val){
    $this->name = $val;
  }

  /**
   * Establece el Nro de filas adicionales para insertar
   * nuevos datos en el grid. Por defecto 15
   *
   * @param $val (int) Cantidad de fila nuevas
   * @return bool
   */
  public function setFilas($val){

    $this->filas=$val;

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
  public function setAnchogrid($val){

    $this->anchogrid = (int)$val;

  }

  /**
   * Estable el ancho total del interior del grid
   *
   * @param $val (string) Nombre de la Tabla/Clase
   * @return bool
   */
  public function setAncho($val){

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
    $name      =    array();
    $ancho     =    (string)$this->ancho;
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
    $tiposobj  =    array();
    $montos    =    array();
    $vacia     =    array();
    $oculta    =    array();
    $combo     =    array();
    $boton     =    array();
    $default   =    array();
    $funcionajax=   array();
    $ajaxfila  =    array();
    $ajaxcolumna=   array();
    $ajaxgrid  =    array();
    $ajaxadicionales=array();
    $anchogrid =    (string)$this->anchogrid;
    $valida=array();
    $camposcombo=array();

    foreach ($this->colums as $key => $col){

      $titulos[]  =    $col->getTitulo();
      $alignf[]   =    $col->getAlineacionObjeto();
      $alignt[]   =    $col->getAlineacionContenido();
      $campos[]   =    $col->getNombreCampo();
      $vacia[]    =    $col->getVacia();
      $oculta[]   =    $col->getOculta();
      $tiposobj[] =    $col->getTipo();
      $ajaxfila[] =    $col->getAjaxfila();
      $ajaxcolumna[]=  $col->getAjaxcolumna();
      $ajaxgrid[] =    $col->getAjaxgrid();
      $ajaxadicionales[] = $col->getAjaxadicionales();
      $camposcombo[]   =    $col->getCombosclase();
      if($col->getValida()) $valida[]=$col->getNombreCampo();

    if($col->isGrabable()){
      $t = $col->getTipo();
      $tipos[]    =    $t; //texto, monto, fecha --solo de los campos a grabar, no de todo el grid
      if($t == Columna::MONTO){
        $montos[] =    (string)($key+1);
        if($col->isTotal()==true){
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
    }else
    {
      $t = $col->getTipo();
      $tipos[]    =    $t; //texto, monto, fecha --solo de los campos a grabar, no de todo el grid
      if($t == Columna::MONTO)
      {
        $montos[] =    (string)($key+1);
        if($col->isTotal()==true)
        {
          $objtotal = $col->getObjetoTotal();

          if($objtotal=='')
          {
            $objtotal = 'total'.(string)($key+1);
          }
          $totales[] = $objtotal;
        }
        else
        {
          $totales[] = '';
          $filatotal[] = '';
        }
      }
    }

    if($col->getBoton()) {
      $boton[] = $col->getEnlaceboton();
    }
    else $boton[] = '';

      $html[]     =    $col->getHTML();
      $js[]       =    $col->getJScript();
      $catalogos[]=    $col->getCatalogo((string)($key+1));// por todas las columnas, si no tiene, se coloca vacio
      $ajax[]     =    $col->getAjax((string)($key+1));
      $funcionajax[]=  $col->getFuncionajax();
      $combo[]    =    $col->getCombo();
      $checkbox[] =    $col->getCheckbox();
      $default[]  =    $col->getDefault();

    $htmlfilatotal[] = '<input class="grid_txtright" type="text" id="total'.($key+1).'" name="total" size="25">';

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

    $obj=array('cabeza'=> $this->titulo, 'name'=> $this->name, 'filas'=> $this->filas, 'eliminar'=> $this->eliminar, 'titulos'=> $titulos,
  'ancho'=> $ancho, 'alignf'=> $alignf, 'alignt'=> $alignt, 'campos'=> $campos, 'catalogos' => $catalogos,
  'ajax' => $ajax, 'tipos' => $tipos, 'montos'=> $montos, 'filatotal' => $filatotal, 'totales'=> $totales,
  'html'=> $html, 'js'=> $js, 'datos'=> $per, 'grabar'=> $grabar, 'tabla' => $this->tabla, 'vacia' => $vacia, 'oculta' => $oculta,
  'tiposobj' => $tiposobj, 'combo' => $combo, 'checkbox' => $checkbox, 'boton' => $boton, 'default' => $default, 'funcionajax' => $funcionajax,
  'jseliminar' => $this->jseliminar, 'ajaxfila' => $ajaxfila, 'ajaxcolumna' => $ajaxcolumna, 'ajaxgrid' => $ajaxgrid, 'ajaxadicionales' => $ajaxadicionales, 'anchogrid' => $anchogrid, 'valida' => $valida, 'camposcombo'=> $camposcombo);

    return $obj;

  }

}



?>
