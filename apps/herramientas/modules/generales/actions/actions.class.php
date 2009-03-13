<?php

/**
 * generales actions.
 *
 * @package    siga
 * @subpackage generales
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class generalesActions extends sfActions
{

  //public $objs = array();

  public function executeIndex()
  {

    $this->redirect('catalogo');

  }

  public function executeLogin()
  {

    $this->setFlash('sincredencial','No tiene acceso a este formulario del Módulo de Compras. Trate autenticando con otro usuario.');

  }

  public function executeCatalogo()
  {
    $opciones = array();
    $principales = array();
    $params = array();
    $this->clase = '';

    // Nos traemos el form html donde se actualizarán los objetos
    if($this->getRequest()->hasParameter('frame'))
    {
      $this->form = $this->getRequestParameter('frame','');
    }

    if($this->getRequest()->hasParameter('submit'))
    {
      $this->dosubmit = $this->getRequestParameter('submit','false');
    }else $this->dosubmit = 'false';

    // Identificamos la clase(tabla) de la cual nos traemos los datos
    if($this->getRequest()->hasParameter('clase'))
    {
      $clase = $this->getRequestParameter('clase','');
      $principales['clase'] = $clase;
      $this->clase = $clase;
    }
    $hay_obj=true;
    $index = 1;
    $obj = "";

    // Ordenamos el arreglo de objetos del catálogo;
    while ($hay_obj){

      if($this->getRequest()->hasParameter('obj'.$index)){
        $obj = $this->getRequestParameter('obj'.$index,'');
        $key = '';

        if(strpos($obj,'_')!=false) {
          if($this->getRequest()->hasParameter('campo'.$index)){
            $key = $this->getRequestParameter('campo'.$index,'');
          }else{
            $array_key = explode('_',$obj);

            if(isset($array_key[1])) $key = $array_key[1];
            else {
              if($this->getRequest()->hasParameter('campo'.$index)){
                $key = $this->getRequestParameter('campo'.$index,'');
              }else $key = $index - 1;
            }
          }
        }else {
          if($this->getRequest()->hasParameter('campo'.$index)){
            $key = $this->getRequestParameter('campo'.$index,'');
          }else $key = $index - 1;
        }
        $listobjs[$key] = $obj;

        $index++;
      }else $hay_obj=false;
    } //While

    $this->objs = $listobjs;

    $hay_obj=true;
    $index = 1;
    $params = array();

    // Ordenamos el arreglo de objetos del catálogo;
    while ($hay_obj){
      if($this->getRequest()->hasParameter('param'.$index)){
        $params[] = $this->getRequestParameter('param'.$index,'');
        $index++;
      }else $hay_obj=false;
    } //While

    $clase = $this->getRequestParameter('metodo','?');
    $principales['metodo'] = $clase;

    // Se cargan los criterios de filtrado si los hay
    if($this->getRequestParameter('filter','')=='Filtrar'){
      if ($this->getRequest()->hasParameter('filters'))
      {
        $filters = $this->getRequestParameter('filters');
        $opciones['filters'] = $filters;

        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/'.$clase.'/filters');
        $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/'.$clase.'/filters');
        $this->filters = $filters;

      }else{
        $filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/'.$clase.'/filters');
        //print_r ($filters);
        $opciones['filters'] = $filters;
        $this->filters = $filters;
      }
    }elseif($this->getRequestParameter('filter','')=='Limpiar'){
      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/'.$clase.'/filters');
      $this->filters = array();
    }else{
      $filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/'.$clase.'/filters');
      //print_r ($filters);
      $opciones['filters'] = $filters;
      $this->filters = $filters;
    }


    // Crierios de ordenamiento de la información
    if ($this->getRequest()->hasParameter('sort'))
    {
      $opciones['sort'] = $this->getRequestParameter('sort');
      $opciones['type'] = $this->getRequestParameter('type', 'asc');
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/'.$clase.'/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/'.$clase.'/sort');
    }else{
      $opciones['sort'] = $this->getUser()->getAttribute('sort', null, 'sf_admin/'.$clase.'/sort');
      $opciones['type'] = $this->getUser()->getAttribute('type', null, 'sf_admin/'.$clase.'/sort');
    }

    if($this->getRequest()->hasParameter('page'))
    {
      $page = $this->getRequestParameter('page');
      $opciones['page'] = $page;
    }

    // Generamos los mismos parámetros para ser pasados a los links del pager
    $param = $this->getRequest()->getParameterHolder()->getAll();

    //print '<pre>';
    //print_r($param);
    //print '</pre>';

    foreach ($param as $keyparam => $value){
      if($value!='generales' && $value!='catalogo' && $keyparam!='page' && $keyparam!='type' && $keyparam!='sort' && $keyparam!='filters' && $keyparam!='filter') $this->param .= '&'.$keyparam.'='.$value;
    }

    // Se llama a la clase que genera los datos del catálogo
    $ctlg = new CatalogoWeb();

    $this->ctlg = $ctlg;

    $ctlg->Construir($principales,$this->objs,$opciones,$params);
    $this->pager = $ctlg->getPager();
    $this->columnas = $ctlg->getArrayFieldsNames();
    $this->filters = $ctlg->getOpciones('filters');

  }

  public function executeAutocomplete()
  {
  $fieldwhere = $this->getRequestParameter('fieldwhere','');
  $table = $this->getRequestParameter('table','');
  $fieldget = $this->getRequestParameter('fieldget','');
  $val = $this->getRequestParameter('val','');
  $val = $this->getRequestParameter($val,'');

  $this->tags=Herramientas::autocompleteAjax($fieldwhere,$table,$fieldget,$val);
  }

  public function executeCatalogobuscar()
  {
      $space=$this->getRequestParameter('space');
    $this->sql=$this->getUser()->getAttribute('sql',null,$space);
    $this->sql=str_replace("¿","'",$this->sql);
    $this->objs=$this->getRequestParameter('objs');
    $this->campos=$this->getRequestParameter('campos');
    Herramientas::BuscarDatos($this->sql,&$result);
    $this->seguir=false;
    if (count($result)>0)
    {
        $this->arre=$result;
        $this->seguir=true;
    }

  }


  public function executeCatalogobuscarcheck()
  {
    $space      = $this->getRequestParameter('space');
    $this->sql  = $this->getUser()->getAttribute('sql',null,$space);
    $this->sql  = str_replace("¿","'",$this->sql);
    $this->objs = $this->getRequestParameter('objs');
    $this->campos = $this->getRequestParameter('campos');
    $this->params = $this->getRequestParameter('params');
    Herramientas::BuscarDatos($this->sql,&$result);
    $this->seguir = false;

    if (count($result)>0)
    {
        $this->arre   = $result;
        $this->seguir = true;
    }
  }
}
