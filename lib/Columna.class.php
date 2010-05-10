<?php

/**
 * Columna: Clase para el manejo de las columnas del grid
 *
 * @package    Roraima
 * @subpackage lib
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Columna
{
  CONST CENTRO = 'center';
  CONST IZQUIERDA = 'left';
  CONST DERECHA = 'right';

  CONST TEXTO = 't';
  CONST MONTO = 'm';
  CONST FECHA = 'f';
  CONST COMBO = 'c';
  CONST TEXTAREA = 'a';
  CONST CHECK = 'k';


  private $titulo='';
  private $alignf='left';
  private $alignt='left';
  private $field='';
  private $type='t';
  private $isnumeric=false;
  private $istotal=false;
  private $objtotal='';
  private $js='';
  private $html = 'type="text" size="10"';
  private $save = false;
  private $catalogoform = '';
  private $catalogoclass = '';
  private $catalogoobj = '';
  private $catalogoparam = array();
  private $nomfor = '';
  private $idfuncion = -1;
  private $objmostrar = -1;
  private $objcompletar= '';
  private $funcion = '';
  private $htmltotalfilas='';
  private $vacia = false;
  private $oculta = false;
  private $combo = array();
  private $checkbox = false;
  private $boton = false;
  private $enlace = '';
  private $predeterminado = '';
  private $catalogometodo = '';
  private $ajaxfila = false;
  private $ajaxcolumna = false;
  private $ajaxgrid = false;
  private $ajaxadicionales = array();
  private $anchogrid='900';
  private $valida='';

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
    $x = array();
    $x=split('_',$val);
    $i=0;
    $this->field="";
    while ($i<count($x)){
    	$y= $this->field;
        $this->field = $y.ucfirst(strtolower($x[$i]));
       $i++;
    }
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
    $this->istotal = $val;
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
  public function setCatalogo($clase,$form,$objs,$metodo = '',$param = array()){

    $this->catalogoform = $form;
    $this->catalogoclass = $clase;
    $this->catalogoobj = $objs;
    $this->catalogometodo = $metodo;
    $this->catalogoparam = $param;

  }

  /**
   * Estable el uso de la función Ajax para traer datos del servidor
   *
   * @param $idFunc (int) Identificador del codigo a ejecutar (con respecto a la función executeAjax())
   * @param $objmost (int) Indice del objeto donde se mostrar la informacion adicional
   * @return void
   */
  public function setAjax($nomfor,$idFunc,$objmost,$function = ''){

    $this->nomfor = $nomfor;
    $this->idfuncion = (int)$idFunc;
    $this->objmostrar = (int)$objmost;
    $this->funcion = $function;

  }

  /**
   * Establece el uso de Ajax para toda la fila
   *
   * @return void
   */
  public function setAjaxfila($val){

    $this->ajaxfila = (bool)$val;

  }

  /**
   * Establece los campos adicionales (fuera del grid) que viajaran en
   * en el llamado ajax
   *
   * @return void
   */
  public function setAjaxadicionales($val){
    $this->ajaxadicionales = $val;

  }


  /**
   * Establece el uso de Ajax para toda la columna
   *
   * @return void
   */
  public function setAjaxcolumna($val){

    $this->ajaxcolumna = (bool)$val;

  }

  /**
   * Establece el uso de Ajax para toda la columna
   *
   * @return void
   */
  public function setAjaxgrid($val){

    $this->ajaxgrid = (bool)$val;

  }


  /**
   * Estable si al objeto se le coloca al inicio el valor que trae el objeto
   *
   * @param $val (bool) Estado de los objetos de la columna
   * @return void
   */
  public function setVacia($val=false){

    $this->vacia = $val;

  }

  /**
   * Estable si va a ser una columna oculta o no
   *
   * @param $val (bool) Estado de los objetos de la columna
   * @return void
   */
  public function setOculta($val=false){

    $this->oculta = $val;

  }

  /**
   * Estable las opciones que va a contener el combo
   *
   * @param $val Arreglo de opciones del COmbo
   * @return void
   */
  public function setCombo($val){

    if(is_array($val)) $this->combo = $val;
    else $this->combo = array();

  }

  /**
   * Estable las opciones que va a contener el combo
   *
   * @param $val Arreglo de opciones del COmbo
   * @return void
   */
  public function setCheckbox($val){

    $this->checkbox = $val;

  }

  /**
   * Estable si la celda va a contener un boton.
   * Este botón estará enlazado al contenido de la
   * variable $enlaceboton
   *
   * @param $val Arreglo de opciones del COmbo
   * @return void
   */
  public function setBoton($val){

    $this->boton = $val;

  }

  /**
   * Establece el enlace que va a contener el botón
   *
   * @param $val string con enlace a usar en e nuevo botón
   * @return void
   */
  public function setEnlaceboton($val){

    $this->enlace = $val;

  }

  /**
   * Establece el valor por defecto a colcoar en las filas nuevas
   *
   * @param $val string con el valor por defecto
   * @return void
   */
  public function setDefault($val){

    $this->predeterminado = $val;

  }

  /**
   * Establece el valor por defecto del ancho de la columna
   *
   * @param $val string con el valor por defecto
   * @return void
   */
  public function setAnchogrid($val){

    $this->anchogrid = $val;

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
  public function getCatalogo($pos=0){ // $grabar

    $arr = array();

    $arr[0] = $this->catalogoclass;
    $arr[1] = $this->catalogoform;
    $arr[2] = $this->catalogometodo;
    $arr[3] = array();
    $arr[4] = $this->catalogoparam;

    if(is_array($this->catalogoobj)){
      $arr[3][$this->getNombreCampo()] = $pos;
      foreach($this->catalogoobj as $index => $obj){
        $arr[3][$index] = $obj;

      }
    }else $arr[3][$this->getNombreCampo()] = $this->catalogoobj;

    return $arr;
  }

  /**
   * Obtiene La codificación para hacer el llamado a una funcion AJAX
   * en los objetos de la columna
   *
   * @return string
   */
  public function getAjax($objcompl='#'){

    if($this->idfuncion!=-1 && $this->objmostrar!=-1) return (string)$this->idfuncion.'-x'.(string)$this->objmostrar.'-x'.$objcompl.'-'.$this->nomfor;
    else return '';

  }

  /**
   * Identifica si se hace un llamado ajax de toda la fila
   *
   * @return string
   */
  public function getAjaxfila(){

    return $this->ajaxfila;

  }

  /**
   * Identifica si se hace un llamado ajax de toda la columna
   *
   * @return string
   */
  public function getAjaxcolumna(){

    return $this->ajaxcolumna;

  }

  /**
   * Identifica si se hace un llamado ajax de todo el grid
   *
   * @return string
   */
  public function getAjaxgrid(){

    return $this->ajaxgrid;

  }

  /**
   * Retorna los campos adicionales (fuera del grid) que viajaran en
   * en el llamado ajax
   *
   * @return void
   */
  public function getAjaxadicionales(){

    return $this->ajaxadicionales;

  }

  /**
   * Obtiene La función a ejecutarse luego de que el llamado ajax haya terminado
   *
   * @return string
   */
  public function getFuncionajax(){

    return $this->funcion;

  }

  /**
   * obtiene si la columna esta o no vacia al iniciar
   *
   * @return string
   */
  public function getVacia(){

    return $this->vacia;

  }

/**
   * obtiene si la columna esta o no oculta
   *
   * @return string
   */
  public function getOculta(){

    return $this->oculta;

  }

  /**
   * Obtiene las opciones que va a contener el combo
   *
   * @return void
   */
  public function getCombo(){

    return $this->combo;

  }

  /**
   * Obtiene las opciones que va a contener el combo
   *
   * @return void
   */
  public function getCheckbox(){

    return $this->checkbox;

  }


  /**
   * Verifica si la columna contiene o no un botón
   *
   * @return void
   */
  public function getBoton(){

    return $this->boton;

  }

  /**
   * Verifica si la columna contiene o no un botón
   *
   * @return void
   */
  public function getEnlaceboton(){

    return $this->enlace;

  }

  /**
   * Retorna el valor por defecto para las filas nuevas
   *
   * @return void
   */
  public function getDefault(){

    return $this->predeterminado;

  }

  /**
   * Retorna el valor por defecto para el grid
   *
   * @return void
   */
  public function getAnchogrid(){

    return $this->anchogrid;

  }
  /**
   * Retorna el valor por defecto para el grid
   *
   * @return void
   */
  public function getValida(){

    return $this->valida;

}

  /**
   * Valida si la columna retorna vacio
   *
   * @param $val string con el valor por defecto
   * @return void
   */
  public function setValida($val){

    $this->valida = $val;

  }

}

?>