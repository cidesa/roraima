<?php

/**
 * ingadidis actions.
 *
 * @package    siga
 * @subpackage ingadidis
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingadidisActions extends autoingadidisActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
  		$this->setVars();
		$this->configGrid();

  }

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



  public function configGrid($reg = array(),$regelim = array())
  {
    $c = new Criteria();
    $c->add(CimovadiPeer::REFADI,$this->ciadidis->getRefadi());
    $per = CimovadiPeer::doSelect($c);
	$mascara=$this->mascarapresupuesto;
	$longitud=$this->longpre;
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/ingadidis/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

    $obj= array('codpre' => 1);
    $params= array('param1' => $longitud, 'val2');
    $this->columnas[1][0]->setCatalogo('Cideftit','sf_admin_edit_form',$obj,'Ingadidis_cideftit',$params);
    $this->columnas[1][1]->setEsTotal(true,'ciadidis_totadi');

    $this->grid = $this->columnas[0]->getConfig($per);
    $this->ciadidis->setGrid($this->grid);


  }

    public function setVars()
  {


  	$this->mascarapresupuesto = Herramientas::getX('Codemp','Cidefniv','Forpre','001');
  	$this->longpre=strlen($this->mascarapresupuesto);


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

  public function saving($ciadidis)
  {

  	$ano=substr(date('d/m/YY'),6,4);
  	$ciadidis->setAnoadi($ano);
  	$ciadidis->setStaadi('A');
    $ciadidis->save();
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    Ingresos::salvarMovadi($ciadidis, $grid);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
