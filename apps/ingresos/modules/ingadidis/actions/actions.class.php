<?php

/**
 * ingadidis actions.
 *
 * @package    Roraima
 * @subpackage ingadidis
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32380 2009-09-01 17:11:59Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class ingadidisActions extends autoingadidisActions
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
    $this->setVars();
    $this->configGrid();
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateCiadidisFromRequest()
  {
    $ciadidis = $this->getRequestParameter('ciadidis');

    if (isset($ciadidis['refadi']))
    {
      $this->ciadidis->setRefadi($ciadidis['refadi']);
    }
    if (isset($ciadidis['fecadi']))
    {
      if ($ciadidis['fecadi'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ciadidis['fecadi']))
          {
            $value = $dateFormat->format($ciadidis['fecadi'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ciadidis['fecadi'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ciadidis->setFecadi($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ciadidis->setFecadi(null);
      }
    }
    if (isset($ciadidis['anoadi']))
    {
      $this->ciadidis->setAnoadi($ciadidis['anoadi']);
    }
    if (isset($ciadidis['desadi']))
    {
      $this->ciadidis->setDesadi($ciadidis['desadi']);
    }
    if (isset($ciadidis['desanu']))
    {
      $this->ciadidis->setDesanu($ciadidis['desanu']);
    }
    if (isset($ciadidis['adidis']))
    {
      $this->ciadidis->setAdidis($ciadidis['adidis']);
    }
    if (isset($ciadidis['totadi']))
    {
      $this->ciadidis->setTotadi($ciadidis['totadi']);
    }
    if (isset($ciadidis['staadi']))
    {
      $this->ciadidis->setStaadi($ciadidis['staadi']);
    }
    if (isset($ciadidis['fecanu']))
    {
      if ($ciadidis['fecanu'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ciadidis['fecanu']))
          {
            $value = $dateFormat->format($ciadidis['fecanu'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ciadidis['fecanu'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ciadidis->setFecanu($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ciadidis->setFecanu(null);
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
    $c = new Criteria();
    $c->add(CimovadiPeer::REFADI,$this->ciadidis->getRefadi());
    $per = CimovadiPeer::doSelect($c);

    $mascara  = $this->mascarapresupuesto;
    $longitud = $this->longpre;

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/ingadidis/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

    $obj= array('codpre' => 1);
    $params= array('param1' => $longitud, 'val2');
    $this->columnas[1][0]->setCatalogo('Cideftit','sf_admin_edit_form',$obj,'Ingadidis_cideftit',$params);
    $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="'.chr(39).$longitud.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="vacio(event,this.id),ajaxexiste(event,this.id),repetido(event,this.id),hayasignacion(event,this.id)"');
    $this->columnas[1][1]->setHTML('onBlur="event.keyCode=13;return formatoDecimal(event,this.id),valcod(event,this.id),haydisponibilidad(event,this.id),calculartotal()"');
    $this->grid = $this->columnas[0]->getConfig($per);
    $this->ciadidis->setGrid($this->grid);

  }

   public function setVars()
   {
      $this->mascarapresupuesto = Herramientas::getX('Codemp','Cidefniv','Forpre','001');
      $this->longpre = strlen($this->mascarapresupuesto);
   }


   public function executeSalvaranu()
   {
     $refanu = $this->getRequestParameter('refanu');
     $fecanu = $this->getRequestParameter('fecanu');
     $desanu = $this->getRequestParameter('desanu');
     $adidis = $this->getRequestParameter('adidis');

     $c= new Criteria();
     $c->add(CimovadiPeer::REFADI,$refanu);
     $reg = CimovadiPeer::doSelect($c);
     $anular = 1;
     $this->msg='-1';

    if ($adidis=='A'){
      $anular = Ingresos::verificardisponibilidad($reg);
    }

    if ($anular==1){
      $c = new Criteria();
      $c->add(CiadidisPeer::REFADI,$refanu);
      $this->ciadidis = CiadidisPeer::doSelectOne($c);

      $this->ciadidis->setDesanu($desanu);
      $this->ciadidis->setFecanu($fecanu);
      $this->ciadidis->setStaadi('N');
      $this->ciadidis->save();

    //Anular Mov_adi
      $c = new Criteria();
      $c->add(CimovadiPeer::REFADI,$refanu);
      $per = CimovadiPeer::doSelect($c);

      foreach ($per as $dato){
        $dato->setStamov('N');
        $dato->save();
      }
    }//else if ($anular==0){
     // $this->msg="No se pudo anular la adici&oacute;n o disminuci&oacute;n, el monto de la partida es menor que el monto de la adici&oacute;n o disminuci&oacute;n y al disminuirla por el monto de la adici&oacute;n o disminuci&oacute;n quedar&iacute;a negativa";

    //}
    else if ($anular==2){
      $this->msg="No se puede Eliminar o Anular la Adicion, Ya que el Monto de la Adicion quedaria Negativa";

    }else if ($anular==3){
      $this->msg="Existe Partida que no se encuentra en la Base de Datos, Por favor Verifique";
    }

    sfView::SUCCESS;
  }

    public function executeAnular()
    {
    $refadi=$this->getRequestParameter('refadi');
    $fecadi=$this->getRequestParameter('fecadi');

    $c = new Criteria();
    $c->add(CiadidisPeer::REFADI,$refadi);
    $c->add(CiadidisPeer::FECADI,$fecadi);
    $this->ciadidis = CiadidisPeer::doSelectOne($c);
    sfView::SUCCESS;
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
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '2':
        $codigo = $this->getRequestParameter('codigo');
        $cajtexcom = $this->getRequestParameter('cajtexcom');

        $c= new Criteria();
        $c->add(CideftitPeer::CODPRE,$codigo);
        $reg=CideftitPeer::doSelectOne($c);

        if ($reg)
        {
          $output = '[["","",""]]';
        }
        else
        {
          $javascript="alert('Código presupuestario no existe'); $('$cajtexcom').value='';";

        $output = '[["javascript","'.$javascript.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
        }
        break;

      case '3':
        $codigo = $this->getRequestParameter('codigo');
        $mon    = $this->getRequestParameter('monto');
        $ano    = $this->getRequestParameter('ano');
        $cajtexmos  = $this->getRequestParameter('cajtexmos');
        $cajtexcom  = $this->getRequestParameter('cajtexcom');
        $cajmon  = $this->getRequestParameter('cajmon');
        $tipo       = $this->getRequestParameter('tipo');
        $javascript = "";

        $monto=H::convnume($mon);

        $c= new Criteria();
        $c->add(CiasiiniPeer::CODPRE,$codigo);
        $c->add(CiasiiniPeer::ANOPRE,$ano);
        $c->add(CiasiiniPeer::PERPRE,'00');
        $reg=CiasiiniPeer::doSelectOne($c);

    if ($reg){

    $monaux=$reg->getMondis();

    if ($tipo=='D'){

        if ($monto>$monaux){

          $javascript="alert_('No existe disponibilidad para hacer esta disminuci&oacute;n'); $('$cajmon').value='0,00'; $('$cajtexcom').value=''; ";
          $output = '[["javascript","'.$javascript.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        }else{

          $dispon=$monaux-$monto;
          $disponible=H::FormatoMonto($dispon,'2');
          $output = '[["'.$cajtexmos.'","'.$disponible.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        }
        }else{

          $dispon=$monaux+$monto;
          $disponible=H::FormatoMonto($dispon,'2');
          $output = '[["'.$cajtexmos.'","'.$disponible.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        }

        }else{
          $javascript="alert_('El C&oacute;digo Presupuestario no tiene asignaci&oacute;n Inicial'); $('$cajtexcom').value=''";
          $output = '[["javascript","'.$javascript.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');        
        }

      return sfView::HEADER_ONLY;
      break;

      case '4':

        $codigo= $this->getRequestParameter('codigo');
        $c = new Criteria();
        $c->add(CiasiiniPeer::PERPRE,'00');
        $c->add(CiasiiniPeer::CODPRE,$codigo);
        $asignacion = CiasiiniPeer::doSelect($c);

        if (count($asignacion)==0){
          $javascript = "alert('El t&iacute;tulo presupuestario no tiene asignaci&oacute;n inicial');";
          $output = '[["javascript","'.$javascript.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        }

      $output = '[["","",""],["","",""],["","",""]]';
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

    if($this->getRequest()->getMethod() == sfRequest::POST){
       $this->ciadidis  =  $this->getCiadidisOrCreate();
       $this->editing();
       $grid = Herramientas::CargarDatosGridv2($this,$this->grid);

       $this->coderr = Herramientas::ValidarGrid($grid);

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
    $this->editing();

    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);

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
  public function saving($ciadidis)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    return Ingresos::SalvarIngadidis($ciadidis, $grid);
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
    if ($clasemodelo->getStaadi()!='N')
    {
      return parent::deleting($clasemodelo);
    }else{
     return 1507;
    }
  }


}
