<?php

/**
 * almusualm actions.
 *
 * @package    siga
 * @subpackage almusualm
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almusualmActions extends autoalmusualmActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
        $codedo='';
        $c = new Criteria();
        $c->add(OcestadoPeer::CODPAI,'0001');
        $c->addAscendingOrderByColumn(OcestadoPeer::NOMEDO);
        $per = OcestadoPeer::doSelect($c);
        $est=array('' => 'Todos los Estados...');
        foreach($per as $r)
          $est[$r->getCodedo()]=$r->getNomedo();
        
        if($this->causualm->getCedemp()!='')
        {
            $c = new Criteria();
            $c->addAscendingOrderByColumn(CausualmPeer::CODALM);
            $reg = CausualmPeer::doSelect($c);
            foreach($reg as $r)
            {
                $r->setCheck(1);
            }
            $this->configGrid($reg);
            $c = new Criteria();
            $c->add(CadefalmPeer::CODALM,$reg[0]->getCodalm());
            $reg2 = CadefalmPeer::doSelectOne($c);
            if($reg2)
                $codedo=$reg2->getCodedo();                
        }
        else
            $this->configGrid();

        $this->params=array('estado'=>$est,'codedo'=>$codedo);

  }

  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
         $c = new Criteria();
         $c->addAscendingOrderByColumn(CadefalmPeer::CODALM);
         $reg = CadefalmPeer::doSelect($c);
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }

     
     $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almusualm/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
     #$this->obj[1][1]->setHtml('size=40 maxlength=250 onBlur="if($(id).value!=\'\')cambiardescripcion(this.id)"');

     $this->obj = $this->obj[0]->getConfig($reg);
     $this->causualm->setGrid($this->obj);


  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');
    $sw=true;
    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $dato='';
        $js='';
        $c = new Criteria();
        $c->add(UsuariosPeer::CEDEMP,$codigo);
        $per = UsuariosPeer::doSelectOne($c);
        if(!$per)
            $js="$('causualm_cedemp').value='';
                 $('causualm_nomuse').value='';
                 alert('Este usuario no esta registrado');
                 $('causualm_cedemp').focus();";
        else
            $dato = $per->getNomuse();

        $c = new Criteria();
        $c->add(CausualmPeer::CEDEMP,$codigo);
        $per = CausualmPeer::doSelectOne($c);
        if($per){
            $js="$('causualm_cedemp').value='';
                 $('causualm_nomuse').value='';
                 alert('Este usuario ya tiene Registrado Almacenes');
                 $('causualm_cedemp').focus();";
            $dato='';
        }
        $output = '[["causualm_nomuse","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $this->causualm = $this->getCausualmOrCreate();
        if($codigo)
        {
            $c = new Criteria();
            $c->add(CadefalmPeer::CODEDO,$codigo);
            $c->addAscendingOrderByColumn(CadefalmPeer::CODALM);
            $reg = CadefalmPeer::doSelect($c);
            $this->configGrid($reg);
        }else
            $this->configGrid();
        
        $sw=false;
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista    
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    if($sw)
        return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()
        $this->causualm = $this->getCausualmOrCreate();
        $this->configGrid();

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $c = new Criteria();
    $c->add(OcestadoPeer::CODPAI,'0001');
    $c->addAscendingOrderByColumn(OcestadoPeer::NOMEDO);
    $per = OcestadoPeer::doSelect($c);
    $est=array('' => 'Todos los Estados...');
    foreach($per as $r)
      $est[$r->getCodedo()]=$r->getNomedo();
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);

    $this->params=array('estado'=>$est,'codedo'=>'');
    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
      $coderr='-1';
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
      $c = new Criteria();
      $c->add(CausualmPeer::CEDEMP,$clasemodelo->getCedemp());
      $per = CausualmPeer::doselect($c);
      foreach($per as $r)
        $r->delete();

      $x = $grid[0];
      foreach($x as $r)
      {
          if($r['check']==1)
          {
              $obj = new Causualm();
              $obj->setCedemp($clasemodelo->getCedemp());
              $obj->setCodalm($r['codalm']);
              $obj->save();
          }
      }
      #return parent::saving($clasemodelo);
      if($coderr!='-1')
        return $coderr;
      else
        $this->redirect('almusualm/list');
  }

  public function deleting($clasemodelo)
  {
      $c = new Criteria();
      $c->add(CausualmPeer::CEDEMP,$clasemodelo->getCedemp());
      $per = CausualmPeer::doselect($c);
      foreach($per as $r)
        $r->delete();
      return '-1';

  }
}
