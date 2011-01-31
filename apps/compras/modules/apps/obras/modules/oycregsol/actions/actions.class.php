<?php

/**
 * oycregsol actions.
 *
 * @package    Roraima
 * @subpackage oycregsol
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oycregsolActions extends autooycregsolActions
{
  private $coderr = -1;

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('cedste','ocdatste','cedste',$this->getRequestParameter('ocregsol[cedste]'));
      }
    else if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('codsol','octipsol','codsol',str_pad($this->getRequestParameter('ocregsol[codsol]'),4,0,STR_PAD_LEFT));
      }
    else if ($this->getRequestParameter('ajax')=='3')
      {
       $this->tags=Herramientas::autocompleteAjax('codorg','ocdeforg','codorg',str_pad($this->getRequestParameter('ocregsol[codorg]'),4,0,STR_PAD_LEFT));
      }
    else if ($this->getRequestParameter('ajax')=='4')
      {
       $this->tags=Herramientas::autocompleteAjax('codemp','nphojint','codemp',$this->getRequestParameter('ocregsol[codemp]'));
      }

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
    $cajtexcom = $this->getRequestParameter('cajtexcom','');

    switch ($ajax){
      case '1':
        $dato=Herramientas::getX('cedste','ocdatste','nomste',$codigo);
		$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

        break;
      case '2':
        $dato=Herramientas::getX('codsol','octipsol','dessol',str_pad($codigo,4,0,STR_PAD_LEFT));
		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';

        break;

      case '3':
        $dato=Herramientas::getX('codorg','ocdeforg','desorg',str_pad($codigo,4,0,STR_PAD_LEFT));
		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';

        break;

      case '4':
        $dato=Herramientas::getX('codemp','nphojint','nomemp',$codigo);
		$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

        break;
      case '5':
        //$dato=Herramientas::getX('codemp','nphojint','nomemp',$codigo);
		$output = '[["","",""],["'.$cajtexcom.'","8","c"]]';

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
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateOcregsolFromRequest()
  {
    $ocregsol = $this->getRequestParameter('ocregsol');

    if (isset($ocregsol['numsol']))
    {
      $this->ocregsol->setNumsol(str_pad($ocregsol['numsol'],8,'0',STR_PAD_LEFT));
    }
    if (isset($ocregsol['cedste']))
    {
      $this->ocregsol->setCedste($ocregsol['cedste']);
    }
  if (isset($ocregsol['dessol']))
    {
      $this->ocregsol->setDessol($ocregsol['dessol']);
    }
    if (isset($ocregsol['codsol']))
    {
      $this->ocregsol->setCodsol(str_pad($ocregsol['codsol'],4,'0',STR_PAD_LEFT));
    }
    if (isset($ocregsol['codorg']))
    {
      $this->ocregsol->setCodorg(str_pad($ocregsol['codorg'],4,'0',STR_PAD_LEFT));
    }
    if (isset($ocregsol['fecsol']))
    {
      if ($ocregsol['fecsol'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocregsol['fecsol']))
          {
            $value = $dateFormat->format($ocregsol['fecsol'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocregsol['fecsol'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocregsol->setFecsol($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocregsol->setFecsol(null);
      }
    }
    if (isset($ocregsol['fecres']))
    {
      if ($ocregsol['fecres'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocregsol['fecres']))
          {
            $value = $dateFormat->format($ocregsol['fecres'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocregsol['fecres'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocregsol->setFecres($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocregsol->setFecres(null);
      }
    }
    if (isset($ocregsol['obssol']))
    {
      $this->ocregsol->setObssol($ocregsol['obssol']);
    }
    if (isset($ocregsol['codemp']))
    {
      $this->ocregsol->setCodemp($ocregsol['codemp']);
    }
  }



  /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  public function saveOcregsol($Ocregsol)
  {
    $coderr = -1;

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::salvarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      parent::saveOcregsol($Ocregsol);

      if(is_array($coderr)){
        foreach ($coderr as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);
        }
      }elseif($coderr!=-1){
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
      }

    } catch (Exception $ex) {

      $coderr = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);

    }
  }


  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->ocregsol = $this->getOcregsolOrCreate();
    $this->updateOcregsolFromRequest();

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);
      }
    }

    return sfView::SUCCESS;
  }

  protected function deleteOcregsol($ocregsol)
  {
    $coderr = -1;

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
       $coderr = Obras::EliminarOycregsol($ocregsol);

      // OJO ----> Eliminar esta linea al modificar este método
     // parent::deleteOcregsol($ocregsol);
    //$ocregsol->delete();

      if(is_array($coderr)){
        foreach ($coderr as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);

        }
      }elseif($coderr!=-1){
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);

      }


    } catch (Exception $ex) {

      $coderr = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);

    }


  }

}
