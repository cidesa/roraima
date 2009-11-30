<?php

/**
 * ingtrasla actions.
 *
 * @package    Roraima
 * @subpackage ingtrasla
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32380 2009-09-01 17:11:59Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class ingtraslaActions extends autoingtraslaActions
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
    if ($this->citrasla->getStatra()=='N') //Nulo
    {
      $this->configGrid_Nulo();
    }else{
      $this->configGrid();
    }
  }



   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid_Nulo(){

    $c = new Criteria();
    $c->add(CimovtraPeer::REFTRA,$this->citrasla->getReftra());
    $per = CimovtraPeer::doSelect($c);
    $mascara=$this->mascarapresupuesto;
    $longitud=$this->longpre;

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/ingtrasla/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    $this->columnas[0]->setEliminar(false);
    $this->columnas[0]->setFilas(0);
    $this->columnas[1][0]->setHTML('readonly=true size="'.chr(39).$longitud.chr(39).'"');
    $this->columnas[1][1]->setHTML('readonly=true size="'.chr(39).$longitud.chr(39).'"');
    $this->columnas[1][2]->setHTML('readonly=true size="10"');

    $this->grid = $this->columnas[0]->getConfig($per);
    $this->citrasla->setGrid($this->grid);
  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid(){

    $c = new Criteria();
    $c->add(CimovtraPeer::REFTRA,$this->citrasla->getReftra());
    $per = CimovtraPeer::doSelect($c);
    $mascara=$this->mascarapresupuesto;
    $longitud=$this->longpre;

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/ingtrasla/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

    $obj1= array('codpre' => 1);
    $obj2= array('codpre' => 2);
    $params= array('param1' => $longitud, 'val2');
    $this->columnas[1][0]->setCatalogo('Cideftit','sf_admin_edit_form',$obj1,'Ingtrasla_cideftit',$params);
    $this->columnas[1][1]->setCatalogo('Cideftit','sf_admin_edit_form',$obj2,'Ingtrasla_cideftit',$params);
    $this->columnas[1][0]->setHTML('type="text" size="'.chr(39).$longitud.chr(39).'" maxlength="'.chr(39).$longitud.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="vacio(event,this.id),ajaxexiste(event,this.id),esultimonivel(event,this.id),escodigodestino(event,this.id)"');
    $this->columnas[1][1]->setHTML('type="text" size="'.chr(39).$longitud.chr(39).'" maxlength="'.chr(39).$longitud.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="ajaxcodpre(event,this.id),ajaxexiste(event,this.id),esultimonivel(event,this.id),escodigoorigen(event,this.id)"');
    $this->columnas[1][2]->setHTML('size="10" onBlur="event.keyCode=13;return formatoDecimal(event,this.id),valcod(event,this.id),haydisponibilidad(event,this.id),vacios(event,this.id),movimientorepetido(event,this.id),calculartotal()"');
    $this->columnas[1][2]->setEsTotal(true,'citrasla_tottra');

    $this->grid = $this->columnas[0]->getConfig($per);
    $this->citrasla->setGrid($this->grid);
  }


  public function setVars()
  {
    $this->mascarapresupuesto = Herramientas::getX('Codemp','Cidefniv','Forpre','001');
    $this->longpre=strlen($this->mascarapresupuesto);
   }

  public function executeSalvaranu()
  {
    $refanu=$this->getRequestParameter('refanu');
    $fecanu=$this->getRequestParameter('fecanu');
    $desanu=$this->getRequestParameter('desanu');

    $c= new Criteria();
    $c->add(CimovtraPeer::REFTRA,$refanu);
    $reg=CimovtraPeer::doSelect($c);
    $anular=1;
    $this->msg='-1';

    $anular = Ingresos::verificardisponibilidad($reg);

    if ($anular==1){
      $c = new Criteria();
      $c->add(CitraslaPeer::REFTRA,$refanu);
      $this->citrasla = CitraslaPeer::doSelectOne($c);

      $this->citrasla->setDesanu($desanu);
      $this->citrasla->setFecanu($fecanu);
      $this->citrasla->setStatra('N');
      $this->citrasla->save();

    //Anular Mov_tra
      $c = new Criteria();
      $c->add(CimovtraPeer::REFTRA,$refanu);
      $per = CimovtraPeer::doSelect($c);

      foreach ($per as $dato){
        $dato->setStamov('N');
        $dato->save();
      }

      $this->msg="Traslado anulado exitosamente";

    }//else if ($anular==0){
     // $this->msg="No se pudo anular la adici&oacute;n o disminuci&oacute;n, el monto de la partida es menor que el monto de la adici&oacute;n o disminuci&oacute;n y al disminuirla por el monto de la adici&oacute;n o disminuci&oacute;n quedar&iacute;a negativa";

    //}
    else if ($anular==2){
      $this->msg="No se pudo Anular el Traslado, el Monto de la Partida es Menor que el Monto del Traslado y al Disminuirla por el Monto del Traslado quedaria Negativa";

    }else if ($anular==3){
      $this->msg="Existe Partida que no se encuentra en la Base de Datos, Por favor Verifique";
    }

    sfView::SUCCESS;
  }

  public function executeAnular()
  {
    $reftra=$this->getRequestParameter('reftra');
    $fectra=$this->getRequestParameter('fectra');
    $fectra = split('/', $fectra);
    $fectra = $fectra[2] . "-" . $fectra[1] . "-" . $fectra[0];

    $c = new Criteria();
    $c->add(CitraslaPeer::REFTRA,$reftra);
    $c->add(CitraslaPeer::FECTRA,$fectra);
    $this->citrasla = CitraslaPeer::doSelectOne($c);
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
      case '2':
        $codigo = $this->getRequestParameter('codigo');
        $cajtexcom = $this->getRequestParameter('cajtexcom');

        $c= new Criteria();
        $c->add(CideftitPeer::CODPRE,$codigo);
        $reg=CideftitPeer::doSelectOne($c);

        if ($reg)
        {
          $output = '[["","",""]]';

        }else{
          $javascript="alert('Código presupuestario no existe');$(id).value='';";
          $output = '[["javascript","'.$javascript.'",""]]';

        }

          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
        break;

      case '3':

        $codigo = $this->getRequestParameter('codigo');
        $monto = H::convnume($this->getRequestParameter('monto'));
        $javascript="";

        $sql="Select substr(feccie,1,4) as ano from cidefniv where codemp='001'";

      Herramientas::BuscarDatos($sql,&$ano);

    $anocierre=$ano[0]["ano"];

        $c= new Criteria();
        $c->add(CiasiiniPeer::CODPRE,$codigo);
        $c->add(CiasiiniPeer::ANOPRE,$anocierre);
        $reg=CiasiiniPeer::doSelectOne($c);
        //H::printR($reg);exit;


        if ($monto>$reg->getMondis()){
          $javascript="alert('No existe disponibilidad para hacer este traslado');$(idmonto).value='0.00';";
        }
        $output = '[["javascript","'.$javascript.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
      break;

      case '4':

        $codigo= $this->getRequestParameter('codigo');
        $c = new Criteria();
      $c->add(CiasiiniPeer::PERPRE,'00');
      $c->add(CiasiiniPeer::CODPRE,$codigo);
      $asignacion = CiasiiniPeer::doSelect($c);


        if (count($asignacion)==0){

          $javascript = "alert('El t&iacute;tulo presupuestario no tiene asignaci&oacute;n inicial');$(cod).value='';$(id).value='';";
          $output = '[["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        }


      break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    //$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

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
    if($this->getRequest()->getMethod() == sfRequest::POST){

       $this->citrasla  =  $this->getCitraslaOrCreate();
       $this->configGrid();
       $grid = Herramientas::CargarDatosGridv2($this,$this->grid);

       $this->coderr = Herramientas::ValidarGrid($grid);

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
  }



  protected function saving($citrasla)
  {
    try{
      $fecha=$citrasla->getFectra();
      $sql="select pereje from cipereje where '".$fecha."'>=fecdes and '".$fecha."'<=fechas";
      H::BuscarDatos($sql,&$dato);
      $citrasla->setPertra($dato[0]["pereje"]);
      $citrasla->setAnotra(substr($fecha,0,4));
      $citrasla->setStatra(H::iif(($citrasla->getStatra()==''),'A',$citrasla->getStatra()));
      $citrasla->save();
      $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
      return Ingresos::salvarDetalletraslado($citrasla, $grid);

    } catch (Exception $ex){
      return 0;
    }
  }

  protected function deleting($citrasla)
  {
    $citrasla->delete();
  }



  public function updateError()
  {
    $this->editing();
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
  }

}
