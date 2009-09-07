<?php

/**
 * ingemifac actions.
 *
 * @package    Roraima
 * @subpackage ingemifac
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class ingemifacActions extends autoingemifacActions
{

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


  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateInfacturaFromRequest()
  {
    $infactura = $this->getRequestParameter('infactura');

    if (isset($infactura['numfac']))
    {
      $this->infactura->setNumfac(str_pad($infactura['numfac'], 4, '0', STR_PAD_LEFT));
    }
    if (isset($infactura['tipper']))
    {
      $this->infactura->setTipper($infactura['tipper']);
    }
    if (isset($infactura['cedrif']))
    {
      $this->infactura->setCedrif($infactura['cedrif']);
    }
    if (isset($infactura['cedprof']))
    {
      $this->infactura->setCedprof($infactura['cedprof']);
    }
    if (isset($infactura['rifemp']))
    {
      $this->infactura->setRifemp($infactura['rifemp']);
    }
    if (isset($infactura['codingprof']))
    {
      $this->infactura->setCodingprof($infactura['codingprof']);
    }
    if (isset($infactura['codmul']))
    {
      $this->infactura->setCodmul($infactura['codmul']);
    }
    if (isset($infactura['moncan']))
    {
      $this->infactura->setMoncan($infactura['moncan']);
    }
    if (isset($infactura['indefban_id']))
    {
    $this->infactura->setIndefbanId($infactura['indefban_id'] ? $infactura['indefban_id'] : null);
    }
    if (isset($infactura['tipconc']))
    {
      $this->infactura->setTipconc($infactura['tipconc']);
    }
    if (isset($infactura['idconc']))
    {
      $this->infactura->setIdconc($infactura['idconc']);
    }
    if (isset($infactura['numdep']))
    {
      $this->infactura->setNumdep($infactura['numdep']);
    }
    if (isset($infactura['fecemi']))
    {
      if ($infactura['fecemi'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($infactura['fecemi']))
          {
            $value = $dateFormat->format($infactura['fecemi'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $infactura['fecemi'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->infactura->setFecemi($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->infactura->setFecemi(null);
      }
    }

  }



  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
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

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
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
        $codigo = $this->getRequestParameter('codigo','');

        $c= new Criteria();
        $c->add(InprofesPeer::CEDPROF,$codigo);
        $c->addJoin(InprofesPeer::INESPECI_ID,InespeciPeer::ID);
        $datos=InprofesPeer::doSelectOne($c);
        if ($datos){
        	$letra=$datos->getVenext();
        	$ced=$datos->getCedprof();
        	$nombre=$datos->getNomprof();
        	$apellido=$datos->getApeprof();
        	$telef=$datos->getTelhab();
        	$espec=$datos->getDesespeci();
        }else{
        	$telef='';
        	$espec='';
        	$letra='';
        	$ced='';
        	$nombre='';
        	$apellido='';
        }
        $output = '[["infactura_nomprof","'.$nombre.' '.$apellido.'",""],["infactura_especi","'.$espec.'",""],["infactura_telhab","'.$telef.'",""]]';
        break;

      case '2':
        $rif= $this->getRequestParameter('codigo','');

        $c= new Criteria();
        $c->add(InempresaPeer::RIFEMP,$rif);
        $c->addJoin(InempresaPeer::INTIPEMP_ID,IntipempPeer::ID);
        $datos=InempresaPeer::doSelectOne($c);
        if ($datos){
        	$tipo=$datos->getDestipemp();
        	$tlf=$datos->getTelemp();
        }else{
        	$tipo='';
        	$tlf='';
        }
        $output = '[["infactura_tipemp","'.$tipo.'",""],["infactura_telemp","'.$tlf.'",""]]';
        break;

      case '3':
        $multa= $this->getRequestParameter('codigo','');

        $c= new Criteria();
        $c->add(InmultaPeer::CODMUL,$multa);
        $datos=InmultaPeer::doSelectOne($c);
        if ($datos){
        	$desmul=$datos->getDesmul();
        	$monto=$datos->getUnitri();
        }else{
        	$monto='';
        }
        $output = '[["infactura_moncan","'.$monto.'",""],["infactura_desmul","'.$desmul.'",""]]';
        break;

      case '4':
        $ingreso= $this->getRequestParameter('codigo','');

        $c= new Criteria();
        $c->add(IningprofPeer::CODINGPROF,$ingreso);
        $datos=IningprofPeer::doSelectOne($c);
        if ($datos){
        	$desing=$datos->getDesingprof();
        	$monto=$datos->getUnitri();
        }else{
        	$monto='';
        }
        $output = '[["infactura_moncan","'.$monto.'",""],["infactura_desingprof","'.$desing.'",""]]';
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
  public function saving($infactura)
  {

      $sql="select max(id) as num from infactura";
      if (Herramientas::BuscarDatos($sql,&$result))
		          {
		          	//H::printR ($result);
		          	$infactura->setNumfac((str_pad($result[0]["num"]+1, 12, '0', STR_PAD_LEFT)));
		          }


  	if ($infactura->getTipper()=='P')
  	{
  		$infactura->setCedrif($infactura->getCedprof());

  	}else
  	{
  		$infactura->setCedrif($infactura->getRifemp());

  	}

  	if ($infactura->getTipconc()=='I')
  	{
  		$infactura->setIdconc($infactura->getCodingprof());

  	}else
  	{
  		$infactura->setIdconc($infactura->getCodmul());

  	}

    return parent::saving($infactura);
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
