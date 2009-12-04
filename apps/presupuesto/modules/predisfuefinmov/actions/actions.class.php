<?php

/**
 * predisfuefinmov actions.
 *
 * @package    Roraima
 * @subpackage predisfuefinmov
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32389 2009-09-01 18:19:14Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class predisfuefinmovActions extends autopredisfuefinmovActions
{
  public $aprobado;

  public function executeIndex()
  {
    return $this->forward('predisfuefinmov', 'edit');
  }


  // Para incluir funcionalidades al executeEdit()
  /**
   * Función para colocar el codigo necesario en  
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function editing()
  {
  $this->configGrid();

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($anoprc='', $ref='',$tipmov='', $reg = array(),$regelim = array())
  {
    $reg=array();
    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
      $this->obj = array();
    }

   $c = new Criteria();
   if ($tipmov=="PRECOMPROMISO"){
     $c->add(CpimpprcPeer :: REFPRC, $ref);
     $c->addJoin(CpimpprcPeer :: CODPRE, CpdisfuefinPeer :: CODPRE);
     $this->sql = "to_char(fecdis,'YYYY') = '" . $anoprc . "'";
     $c->add(CpdisfuefinPeer :: FECDIS, $this->sql, Criteria :: CUSTOM);
      //$c->add(CpdisfuefinPeer :: TIPMOV, $tipmov);
     $reg = CpdisfuefinPeer::doSelect($c);

    if ($reg){
      foreach ($reg as $dato){
      $dato->setTipmov($tipmov);
      $dato->setRefmov($ref);
      $dato->afterHydrate();
      }
    }

   }else if ($tipmov=="COMPROMISO"){
     $c->add(CpimpcomPeer :: REFCOM, $ref);
     $c->addJoin(CpimpcomPeer :: CODPRE, CpdisfuefinPeer :: CODPRE);
     $this->sql = "to_char(fecdis,'YYYY') = '" . $anoprc . "'";
     $c->add(CpdisfuefinPeer :: FECDIS, $this->sql, Criteria :: CUSTOM);
      //$c->add(CpdisfuefinPeer :: TIPMOV, $tipmov);
     $reg = CpdisfuefinPeer::doSelect($c);

    if ($reg){
      foreach ($reg as $dato){
      $dato->setTipmov($tipmov);
      $dato->setRefmov($ref);
      $dato->afterHydrate();
      }
    }

   }else if ($tipmov=="CAUSADO"){
     $c->add(CpimpcauPeer :: REFCAU, $ref);
     $c->addJoin(CpimpcauPeer :: CODPRE, CpdisfuefinPeer :: CODPRE);
     $this->sql = "to_char(fecdis,'YYYY') = '" . $anoprc . "'";
     $c->add(CpdisfuefinPeer :: FECDIS, $this->sql, Criteria :: CUSTOM);
      //$c->add(CpdisfuefinPeer :: TIPMOV, $tipmov);
     $reg = CpdisfuefinPeer::doSelect($c);

    if ($reg){
      foreach ($reg as $dato){
      $dato->setTipmov($tipmov);
      $dato->setRefmov($ref);
      $dato->afterHydrate();
      }
    }

   }else if ($tipmov=="PAGADO"){
     $c->add(CpimppagPeer :: REFPAG, $ref);
     $c->addJoin(CpimppagPeer :: CODPRE, CpdisfuefinPeer :: CODPRE);
     $this->sql = "to_char(fecdis,'YYYY') = '" . $anoprc . "'";
     $c->add(CpdisfuefinPeer :: FECDIS, $this->sql, Criteria :: CUSTOM);
      //$c->add(CpdisfuefinPeer :: TIPMOV, $tipmov);
     $reg = CpdisfuefinPeer::doSelect($c);

    if ($reg){
      foreach ($reg as $dato){
      $dato->setTipmov($tipmov);
      $dato->setRefmov($ref);
      $dato->afterHydrate();
      }
    }

   }else if ($tipmov=="CREDITO"){
     $c->add(CpmovadiPeer :: REFADI, $ref);
     $c->addJoin(CpmovadiPeer :: CODPRE, CpdisfuefinPeer :: CODPRE);
     $this->sql = "to_char(fecdis,'YYYY') = '" . $anoprc . "'";
     $c->add(CpdisfuefinPeer :: FECDIS, $this->sql, Criteria :: CUSTOM);
     $reg = CpdisfuefinPeer::doSelect($c);

    if ($reg){
      foreach ($reg as $dato){
      $dato->setTipmov($tipmov);
      $dato->setRefmov($ref);
      $dato->afterHydrate();
      }
    }

   }else if ($tipmov=="TRASLADO"){   //SOLICITUD DE TRASLADO
     $c->add(CpsolmovtraPeer :: REFTRA, $ref);
     $c->addJoin(CpsolmovtraPeer :: CODORI, CpdisfuefinPeer :: CODPRE);
     $this->sql = "to_char(fecdis,'YYYY') = '" . $anoprc . "'";
     $c->add(CpdisfuefinPeer :: FECDIS, $this->sql, Criteria :: CUSTOM);
     $reg = CpdisfuefinPeer::doSelect($c);
     $this->aprobado = Presupuesto::VerificarAprobacion();

    if ($reg){
      foreach ($reg as $dato){
      $dato->setTipmov($tipmov);
      $dato->setRefmov($ref);
      $dato->afterHydrate();
      }
    }
   }
   $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/predisfuefinmov/'.sfConfig::get('sf_app_module_config_dir_name').'/grip_movimiento');
   $this->columnas[1][3]->setJscript(' javascript:actualizarsaldos(this.id); ');

   $this->obj = $this->columnas[0]->getConfig($reg);

   $this->cpmovfuefin->setObj($this->obj);
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');

    switch ($ajax){
      case '1':
        $this->cpmovfuefin = new Cpmovfuefin();
        $this->cpmovfuefin->setTipmov($codigo);

        $output = '[["","",""],["","",""],["","",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;

      case '2':   //PreCompromiso
    $desprc = Herramientas::getX('refprc','cpprecom','desprc',$codigo);
    $anoprc = Herramientas::getX('refprc','cpprecom','anoprc',$codigo);
    $monprc = H::FormatoMonto(Herramientas::getX('refprc','cpprecom','monprc',$codigo));

        $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
    $this->configGrid($anoprc,$codigo,'PRECOMPROMISO');
    $javascript          =  "$('divGrid').show(), actualizarsaldosTotal()";
    $output = '[["'.$cajtexmos.'","'.$desprc.'",""],["javascript","'.$javascript.'",""],["cpmovfuefin_montot","'.$monprc.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        break;

      case '3':   //Compromiso
      $c = new Criteria();
      $c->add(CpcomproPeer::REFCOM,$codigo);
      $c->addJoin(CpcomproPeer::TIPCOM,CpdoccomPeer::TIPCOM);
      $c->add(CpdoccomPeer::REFPRC,'N');
      $c->add(CpdoccomPeer::AFEDIS,'N',Criteria::NOT_EQUAL);
      $c->add(CpcomproPeer::STACOM,'A');

      $reg = CpcomproPeer::doselect($c);
      $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();

      if ($reg){

      $desprc = Herramientas::getX('refcom','cpcompro','descom',$codigo);
      $anoprc = Herramientas::getX('refcom','cpcompro','anocom',$codigo);
      $monprc = H::FormatoMonto(Herramientas::getX('refcom','cpcompro','moncom',$codigo));

      $this->configGrid($anoprc,$codigo,'COMPROMISO');
      $javascript          =  "$('divGrid').show(), actualizarsaldosTotal()";
      $output = '[["'.$cajtexmos.'","'.$desprc.'",""],["javascript","'.$javascript.'",""],["cpmovfuefin_montot","'.$monprc.'",""]]';

      }else{
        $javascript = "alert('No se puede realizar la Distribucion por Fuente de Financiamiento, ya que este movimiento Refiere a otro que ya tiene distribucion.')";
        $output = '[["javascript","'.$javascript.'",""]]';
      }
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        break;

      case '4':   //Causado
      $c = new Criteria();
      $c->add(CpcausadPeer::REFCAU,$codigo);
      $c->addJoin(CpcausadPeer::TIPCAU,CpdoccauPeer::TIPCAU);
      $c->add(CpdoccauPeer::REFIER,'N');
      $c->add(CpdoccauPeer::AFEDIS,'N',Criteria::NOT_EQUAL);
      $c->add(CpcausadPeer::STACAU,'A');

      $reg = CpcausadPeer::doselect($c);
      $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
      if ($reg){
      $desprc = Herramientas::getX('refcau','cpcausad','descau',$codigo);
      $anoprc = Herramientas::getX('refcau','cpcausad','anocau',$codigo);
      $monprc = H::FormatoMonto(Herramientas::getX('refcau','cpcausad','moncau',$codigo));

      $this->configGrid($anoprc,$codigo,'CAUSADO');
      $javascript          =  "$('divGrid').show(), actualizarsaldosTotal()";
      $output = '[["'.$cajtexmos.'","'.$desprc.'",""],["javascript","'.$javascript.'",""],["cpmovfuefin_montot","'.$monprc.'",""]]';

      }else{
        $javascript = "alert('No se puede realizar la Distribucion por Fuente de Financiamiento, ya que este movimiento Refiere a otro que ya tiene distribucion.')";
        $output = '[["javascript","'.$javascript.'",""]]';
      }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        break;

      case '5':   //Pagado
       $c = new Criteria();
       $c->add(CppagosPeer::REFPAG,$codigo);
       $c->addJoin(CppagosPeer::TIPPAG,CpdocpagPeer::TIPPAG);
       $c->add(CpdocpagPeer::AFEDIS,'N',Criteria::NOT_EQUAL);
       $c->add(CpdocpagPeer::REFIER,'N');
       $c->add(CppagosPeer::STAPAG,'A');
      //$opc1=$c->getNewCriterion(CppagosPeer::REFCAU,'');
      //$opc2=$c->getNewCriterion(CppagosPeer::REFCAU,'NULO');
      //$opc1->addOr($opc2);
      //$c->add($opc1);
      $reg = CppagosPeer::doselect($c);
      $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
      if ($reg){
        $desprc = Herramientas::getX('refpag','cppagos','despag',$codigo);
        $anoprc = Herramientas::getX('refpag','cppagos','anopag',$codigo);
        $monprc = H::FormatoMonto(Herramientas::getX('refpag','cppagos','monpag',$codigo));

        $this->configGrid($anoprc,$codigo,'PAGADO');
        $javascript          =  "$('divGrid').show(), actualizarsaldosTotal()";
        $output = '[["'.$cajtexmos.'","'.$desprc.'",""],["javascript","'.$javascript.'",""],["cpmovfuefin_montot","'.$monprc.'",""]]';
      }else{
        $javascript = "alert('No se puede realizar la Distribucion por Fuente de Financiamiento, ya que este movimiento Refiere a otro que ya tiene distribucion.')";
        $output = '[["javascript","'.$javascript.'",""]]';
      }
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        break;

      case '6':   //Adicion / Disminucion
    $desprc = Herramientas::getX('refadi','cpadidis','desadi',$codigo);
    $anoprc = Herramientas::getX('refadi','cpadidis','anoadi',$codigo);
    $monprc = H::FormatoMonto(Herramientas::getX('refadi','cpadidis','totadi',$codigo));

        $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
    $this->configGrid($anoprc,$codigo,'CREDITO');
    $javascript          =  "$('divGrid').show(), actualizarsaldosTotal()";
    $output = '[["'.$cajtexmos.'","'.$desprc.'",""],["javascript","'.$javascript.'",""],["cpmovfuefin_montot","'.$monprc.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        break;

      case '7':   //Solicitud de Traslado
    $desprc = Herramientas::getX('reftra','cpsoltrasla','destra',$codigo);
    $anoprc = Herramientas::getX('reftra','cpsoltrasla','anotra',$codigo);
    $monprc = H::FormatoMonto(Herramientas::getX('reftra','cpsoltrasla','tottra',$codigo));

    $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
    $this->configGrid($anoprc,$codigo,'TRASLADO');
    if ($this->aprobado)
    {
      $javascript          =  "$('divGrid').show(), actualizarsaldosTotal()";
      $output = '[["'.$cajtexmos.'","'.$desprc.'",""],["javascript","'.$javascript.'",""],["cpmovfuefin_montot","'.$monprc.'",""]]';
    }else
    {
      $javascript =  "alert(Este documento )";
      $output = '[["javascript","'.$javascript.'",""]]';

    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        break;

      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista


    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    //return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
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
     $this->cpmovfuefin = $this->getCpmovfuefinOrCreate();
     $this->updateCpmovfuefinFromRequest();

       $this->configGrid();
       $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

       $this->coderr = Presupuesto::validarPreDisFueFinMov($this->cpmovfuefin,$grid);
       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

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
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

    $this->configGrid($grid[0],$grid[1]);
  }

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de guardar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function saving($clasemodelo)
  {
  try{
        $grid = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObj());
      return	Presupuesto::SalvarPredisfuefinmov($clasemodelo,$grid);
  } catch (Exception $ex){
    exit($ex);
    return 0;
  }
  }

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de eliminar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
