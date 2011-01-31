<?php

/**
 * ingnivpre actions.
 *
 * @package    Roraima
 * @subpackage ingnivpre
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32380 2009-09-01 17:11:59Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class ingnivpreActions extends autoingnivpreActions
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

    $this->configGridPer();
    $this->configGrid();

  }

  public function executeIndex()
  {
    $c= new	Criteria();
    $data=CidefnivPeer::doSelectOne($c);
    if ($data)
    {
      $id=$data->getId();
      return $this->redirect('ingnivpre/edit?id='.$id);
    }
    else { return $this->redirect('ingnivpre/edit');}
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateCidefnivFromRequest()
  {
    $cidefniv = $this->getRequestParameter('cidefniv');

    if (isset($cidefniv['nomemp']))
    {
      $this->cidefniv->setNomemp($cidefniv['nomemp']);
    }
    if (isset($cidefniv['rupcat']))
    {
      $this->cidefniv->setRupcat($cidefniv['rupcat']);
    }
    if (isset($cidefniv['ruppar']))
    {
      $this->cidefniv->setRuppar($cidefniv['ruppar']);
    }
    if (isset($cidefniv['nivdis']))
    {
      $this->cidefniv->setNivdis($cidefniv['nivdis']);
    }
    if (isset($cidefniv['grid']))
    {
      $this->cidefniv->setGrid($cidefniv['grid']);
    }
    if (isset($cidefniv['forpre']))
    {
      $this->cidefniv->setForpre($cidefniv['forpre']);
    }
    if (isset($cidefniv['asiper']))
    {
      $this->cidefniv->setAsiper($cidefniv['asiper']);
    }
    if (isset($cidefniv['fecper']))
    {
      if ($cidefniv['fecper'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cidefniv['fecper']))
          {
            $value = $dateFormat->format($cidefniv['fecper'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cidefniv['fecper'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cidefniv->setFecper($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cidefniv->setFecper(null);
      }
    }
    if (isset($cidefniv['fecini']))
    {
      if ($cidefniv['fecini'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cidefniv['fecini']))
          {
            $value = $dateFormat->format($cidefniv['fecini'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cidefniv['fecini'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cidefniv->setFecini($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cidefniv->setFecini(null);
      }
    }
    if (isset($cidefniv['feccie']))
    {
      if ($cidefniv['feccie'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cidefniv['feccie']))
          {
            $value = $dateFormat->format($cidefniv['feccie'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cidefniv['feccie'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cidefniv->setFeccie($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cidefniv->setFeccie(null);
      }
    }
    if (isset($cidefniv['etadef']))
    {
      $this->cidefniv->setEtadef($cidefniv['etadef']);
    }
    if (isset($cidefniv['numper']))
    {
      $this->cidefniv->setNumper($cidefniv['numper']);
    }
    if (isset($cidefniv['staprc']))
    {
      $this->cidefniv->setStaprc($cidefniv['staprc']);
    }
    if (isset($cidefniv['coraep']))
    {
      $this->cidefniv->setCoraep($cidefniv['coraep']);
    }
    if (isset($cidefniv['gridper']))
    {
      $this->cidefniv->setGridper($cidefniv['gridper']);
    }
    if (isset($cidefniv['coring']))
    {
      $this->cidefniv->setCoring($cidefniv['coring']);
    }
    if (isset($cidefniv['cortras']))
    {
      $this->cidefniv->setCortras($cidefniv['cortras']);
    }
    if (isset($cidefniv['coraju']))
    {
      $this->cidefniv->setCoraju($cidefniv['coraju']);
    }
    if (isset($cidefniv['coradi']))
    {
      $this->cidefniv->setCoradi($cidefniv['coradi']);
    }

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
    $per = CinivelesPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/ingnivpre/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    $this->columnas[1][0]->setCombo(Ingresos::ListaCatpar());
    $this->columnas[1][0]->setHTML('onChange="validarcatpar()"');
    $this->columnas[1][1]->setHTML(' onBlur="actualizarformato(this.id)"');

  $valor=Ingresos::movimientos();

  if($valor==1){

    $this->columnas[1][0]->setHTML('disabled=true');
    $this->columnas[1][1]->setHTML('readonly=true');
    $this->columnas[1][2]->setHTML('readonly=true');
    $this->columnas[1][3]->setHTML('readonly=true');

  }

    //$this->columnas[1][0]->setCombo(Ingresos::ListaCatpar());
    //$this->columnas[1][0]->setHTML('onChange="validarcatpar()"');
    //$this->columnas[1][1]->setHTML('maxlength="2" onKeyPress="actualizarformato()"');


    $this->grid = $this->columnas[0]->getConfig($per);
    $this->cidefniv->setGrid($this->grid);

  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridPer($genera='', $arreglo=array()){
  if ($genera=='')
  {
      $c = new Criteria();
      $per = CiperejePeer::doSelect($c);
  }else{
    $per = $arreglo;
  }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/ingnivpre/'.sfConfig::get('sf_app_module_config_dir_name').'/gridper');

    $valor=Ingresos::movimientos();

  if($valor==1){

   // $this->columnas[1][0]->setHTML('readonly=true');
  //  $this->columnas[1][1]->setHTML('readonly=true');
   // $this->columnas[1][2]->setHTML('readonly=true');

  }


    $this->grid2 = $this->columnas[0]->getConfig($per);
    $this->cidefniv->setGridper($this->grid2);

  }



  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
   $this->cidefniv = $this->getCidefnivOrCreate();
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
        $fecha=$this->getRequestParameter('fecha','');
        $fecfinal=$this->getRequestParameter('fecfinal','');
        $numper=$this->getRequestParameter('numper','');
        $id='';
          $i=1;

  $this->incmes=12/$numper;
  $this->contador=1;
  $per=new Cipereje();
  $per1=array();
    $j=0;

  while ($i<=$numper){
  //print $fecha.$incmes.$fecfinal.$numper.$contador;
       $datos=Ingresos::generarperiodos($fecha,$this->incmes,$fecfinal,$numper,$this->contador);
     $per1[$j]["pereje"]=$datos[0];
     $per1[$j]["fecdes"]=$datos[1];
     $per1[$j]["fechas"]=$datos[2];
     $per1[$j]["id"]='9';
     $this->per1 = $per1;
     $this->contador=$this->contador+1;
     $fec=substr($datos[2],6,4)."-".substr($datos[2],3,2)."-".substr($datos[2],0,2);
     $fech=H::dateAdd('d',1,$fec,'+');
     $fecha=substr($fech,8,2)."/".substr($fech,5,2)."/".substr($fech,0,4);

     $i++;
     $j++;
  }
    $genera='S';
        $this->configGridPer($genera,$this->per1);
        $output = '[["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    //return sfView::HEADER_ONLY;

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

  }

  protected function saving($cidefniv)
  {

    $cidefniv->setCodemp('001');
    $cidefniv->setLoncod(32);
    $cidefniv->setPeract('01');
    $cidefniv->setEtadef('1');
    $cidefniv->save();
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->grid2,true);
    Ingresos::salvarNiveles($cidefniv, $grid);
    Ingresos::salvarPereje($cidefniv, $grid2);
    return -1;

  }

  protected function deleting($cidefniv)
  {

    $cidefniv->delete();
        return -1;

    }




}
