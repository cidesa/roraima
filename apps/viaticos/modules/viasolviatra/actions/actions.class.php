<?php

/**
 * viasolviatra actions.
 *
 * @package    siga
 * @subpackage viasolviatra
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class viasolviatraActions extends autoviasolviatraActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $tipvia=array('N'=>'NACIONAL','I'=>'INTERNACIONAL');
    $this->params=array('tipvia'=>$tipvia);

  }

  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }

    // Insertar el criterio de la busqueda de registros del Grid
    // Por ejemplo:

    // $c = new Criteria();
    // $c->add(CaartaocPeer::AJUOC ,$this->caajuoc->getAjuoc());
    // $reg = CaartaocPeer::doSelect($c);

    // De esta forma se carga la configuración del grid de un archivo yml
    // y se le pasa el parámetro de los registros encontrados ($reg)
    //                                                                            /nombreformulario/
    // $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/formulario/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_caartaoc',$reg);

    // Si no se quiere cargar la configuración del grid de un .yml, sedebe hacer a pie.
    // Por ejemplo:

    /*
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setTabla('Caartalm');
    $opciones->setAnchoGrid(1150);
    $opciones->setTitulo('Existencia por Almacenes');
    $opciones->setHTMLTotalFilas(' ');
    // Se generan las columnas
    $col1 = new Columna('Cod. Almacen');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codalm');
    $col1->setCatalogo('cadefalm','sf_admin_edit_form','2');
    $col1->setAjax(2,2);

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('codalm');
    $col2->setHTML('type="text" size="25" disabled=true');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);

    // Se genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
     */


  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $nomemp = '';
        $cedemp = '';
        $codniv = '';
        $nomniv = '';
        $codcar = '';
        $nomcar = '';
        $codcat = '';
        $nomcat = '';
        $c = new Criteria();
        $c->add(NphojintPeer::CODEMP,$codigo);        
        $per = NphojintPeer::doSelectOne($c);
        if($per)
        {
         $nomemp = $per->getNomemp();
         $cedemp = $per->getCedemp();
         $codniv = $per->getCodniv();
         $codcar = NphojintPeer::getCodcar($codigo);
         $nomcar = NphojintPeer::getNomcar($codcar);
         $c2 = new Criteria();
         $c2->add(NpestorgPeer::CODNIV,$codniv);
         $per2 = NpestorgPeer::doSelectOne($c2);
         if($per2)
             $nomniv=$per2->getDesniv();
         $c2 = new Criteria();
         $c2->add(NpasicarempPeer::CODEMP,$codigo);
         $c2->add(NpasicarempPeer::STATUS,'V');
         $per2 = NpasicarempPeer::doSelectOne($c2);
         if($per2)
         {
            $codcat = $per2->getCodcat();
            $nomcat = $per2->getNomcat();
         }
        }
        
        $output = '[["viasolviatra_nomemp","'.$nomemp.'",""],["viasolviatra_cedemp","'.$cedemp.'",""],["viasolviatra_cargo","'.$codcar.' - '.$nomcar.'",""],
                   ["viasolviatra_nivel","'.$codniv.' - '.$nomniv.'",""],["viasolviatra_codcat","'.$codcat.'",""],["viasolviatra_nomcat","'.$nomcat.'",""]]';
        break;
      case '2':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $nomemp = '';
        $cedemp = '';
        $codniv = '';
        $nomniv = '';
        $codcar = '';
        $nomcar = '';        
        $c = new Criteria();
        $c->add(NphojintPeer::CODEMP,$codigo);
        $per = NphojintPeer::doSelectOne($c);
        if($per)
        {
         $nomemp = $per->getNomemp();
         $cedemp = $per->getCedemp();
         $codniv = $per->getCodniv();
         $codcar = NphojintPeer::getCodcar($codigo);
         $nomcar = NphojintPeer::getNomcar($codcar);
         $c2 = new Criteria();
         $c2->add(NpestorgPeer::CODNIV,$codniv);
         $per2 = NpestorgPeer::doSelectOne($c2);
         if($per2)
             $nomniv=$per2->getDesniv();         
        }
        $output = '[["viasolviatra_nomempaco","'.$nomemp.'",""],["viasolviatra_cedempaco","'.$cedemp.'",""],["viasolviatra_cargoaco","'.$codcar.' - '.$nomcar.'",""],
                   ["viasolviatra_nivelaco","'.$codniv.' - '.$nomniv.'",""]]';
        break;
      case '3';
         $nomniv='';
         $c = new Criteria();
         $c->add(ViadefnivPeer::CODNIV,$codigo);
         $per = ViadefnivPeer::doSelectOne($c);
         if($per)
             $desniv=$per->getDesniv();
         $output = '[["viasolviatra_desnivaco","'.$desniv.'",""]]';
        break;
      case '4';
         $numdia=0;
         $fecdes = $this->getRequestParameter('fecdes','');
         $fechas = $this->getRequestParameter('fechas','');
         $auxfecd = split("/",$fecdes);
         $auxfech = split("/",$fechas);
         if(count($auxfecd)==3 && count($auxfech)==3)
             if(strtotime($auxfecd[2].'-'.$auxfecd[1].'-'.$auxfecd[0]) && strtotime($auxfech[2].'-'.$auxfech[1].'-'.$auxfech[0]))
             {
                $sql="select (to_date('$fechas','dd/mm/yyyy')-to_date('$fecdes','dd/mm/yyyy'))+1 as dias";
                if(H::BuscarDatos($sql, $rs))
                  $numdia=$rs[0]['dias']      ;
             }
         $output = '[["viasolviatra_numdia","'.$numdia.'",""]]';
        break;
      case '5';
        $nomemp = '';
        $cedemp = '';
        $codniv = '';
        $nomniv = '';        
        $c = new Criteria();
        $c->add(NphojintPeer::CODEMP,$codigo);
        $per = NphojintPeer::doSelectOne($c);
        if($per)
        {
         $nomemp = $per->getNomemp();
         $cedemp = $per->getCedemp();
         $codniv = $per->getCodniv();         
         $c2 = new Criteria();
         $c2->add(NpestorgPeer::CODNIV,$codniv);
         $per2 = NpestorgPeer::doSelectOne($c2);
         if($per2)
             $nomniv=$per2->getDesniv();
        }
        $output = '[["viasolviatra_nomempaut","'.$nomemp.'",""],["viasolviatra_cedempaut","'.$cedemp.'",""],
                   ["viasolviatra_nivelaut","'.$codniv.' - '.$nomniv.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
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
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);
    $tipvia=array('N'=>'NACIONAL','I'=>'INTERNACIONAL');
    $this->params=array('tipvia'=>$tipvia);

  }

  public function saving($clasemodelo)
  {
    if($clasemodelo->getNumsol()=='##########')
    {
        $c = new Criteria();
        $per = ViadefgenPeer::doSelectOne($c);        
        $numsol = str_pad($per->getNumsolvia(),10,'0',STR_PAD_LEFT);
        $clasemodelo->setNumsol($numsol);
        $sql="update viadefgen set numsolvia='".($per->getNumsolvia()+1)."'";
        H::insertarRegistros($sql);
    }
    $codnivapr='';
    $aprob='';
    $sql="select b.codnivapr, b.prioriapr, a.aprobacion from viadefproced a, viaasoproniv b
            where
            a.codproced='".$clasemodelo->getCodproced()."' and
            a.codproced=b.codproced and
            a.aprobacion='S'
            order by prioriapr";
    if(H::BuscarDatos($sql, $rs))
    {
        $codnivapr=$rs[0]['codnivapr'];
        $aprob=$rs[0]['aprobacion'];
    }
    $clasemodelo->setCodnivapr($codnivapr);
    if($codnivapr!='')
        $clasemodelo->setStatus('P');
    else
        $clasemodelo->setStatus('A');
    $clasemodelo->setNumsol(str_pad($clasemodelo->getNumsol(),10,'0',STR_PAD_LEFT));    
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    if($clasemodelo->getStatus()=='P')
        return parent::deleting($clasemodelo);
    else
        return 'V003';
  }


}
