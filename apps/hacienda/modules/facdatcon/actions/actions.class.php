<?php

/**
 * Facdatcon actions.
 *
 * @package    siga
 * @subpackage Facdatcon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class FacdatconActions extends autoFacdatconActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
		$this->configGrid();
  }


  public function deleting($fcconrep)
  {
   if ($fcconrep->getId()!="")
   {
	$c = new Criteria();
	$c->add(FcrecconPeer::RIFCON,$fcconrep->getRifcon());
	FcrecconPeer::doDelete($c);
    $fcconrep->delete();
    return -1;
   }
  }

  public function configGrid($reg = array(),$regelim = array())
  {
    $c = new Criteria();
    $c->add(FcrecconPeer::RIFCON,$this->fcconrep->getRifcon());
    $per = FcrecconPeer::doSelect($c);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facdatcon/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
	$this->columnas[1][0]->setCatalogo('Carecaud','sf_admin_edit_form', array('codrec'=>'1','desrec'=>'2'), 'Fcdefdesc_carecaud');
    $this->grid = $this->columnas[0]->getConfig($per);
    $this->fcconrep->setGrid($this->grid);
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
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    $this->configGrid($grid[0],$grid[1]);
  }

  public function saving($fcconrep)
  {
    $fcconrep->save();
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    Hacienda::salvar_grid_Facdatcon($fcconrep, $grid);
    return -1;
  }

 protected function updateFcconrepFromRequest()
  {
    $fcconrep = $this->getRequestParameter('fcconrep');

    if (isset($fcconrep['cedcon']))
    {
      $this->fcconrep->setCedcon($fcconrep['cedcon']);
    }
    if (isset($fcconrep['rifcon']))
    {
      $this->fcconrep->setRifcon($fcconrep['rifcon']);
    }
    if (isset($fcconrep['nomcon']))
    {
      $this->fcconrep->setNomcon($fcconrep['nomcon']);
    }
    if (isset($fcconrep['naccon']))
    {
      $this->fcconrep->setNaccon($fcconrep['naccon']);
    }
    if (isset($fcconrep['tipcon']))
    {
      $this->fcconrep->setTipcon($fcconrep['tipcon']);
    }
    if (isset($fcconrep['dircon']))
    {
      $this->fcconrep->setDircon($fcconrep['dircon']);
    }
    if (isset($fcconrep['codpar']))
    {
      $this->fcconrep->setCodpar($fcconrep['codpar']);
    }
    if (isset($fcconrep['ciucon']))
    {
      $this->fcconrep->setCiucon($fcconrep['ciucon']);
    }
    if (isset($fcconrep['cpocon']))
    {
      $this->fcconrep->setCpocon($fcconrep['cpocon']);
    }
    if (isset($fcconrep['apocon']))
    {
      $this->fcconrep->setApocon($fcconrep['apocon']);
    }
    if (isset($fcconrep['telcon']))
    {
      $this->fcconrep->setTelcon($fcconrep['telcon']);
    }
    if (isset($fcconrep['emacon']))
    {
      $this->fcconrep->setEmacon($fcconrep['emacon']);
    }
    if (isset($fcconrep['faxcon']))
    {
      $this->fcconrep->setFaxcon($fcconrep['faxcon']);
    }
    if (isset($fcconrep['urlcon']))
    {
      $this->fcconrep->setUrlcon($fcconrep['urlcon']);
    }
    if (isset($fcconrep['grid']))
    {
      $this->fcconrep->setGrid($fcconrep['grid']);
    }

    if (isset($fcconrep['cedcon']))
    {
      $this->fcconrep->setCedcon($fcconrep['cedcon']);
    }
    if (isset($fcconrep['rifcon']))
    {
      $this->fcconrep->setRifcon($fcconrep['rifcon']);
    }
    if (isset($fcconrep['nomcon']))
    {
      $this->fcconrep->setNomcon($fcconrep['nomcon']);
    }
    if (isset($fcconrep['repcon']))
    {
      $this->fcconrep->setRepcon($fcconrep['repcon']);
    }
    if (isset($fcconrep['dircon']))
    {
      $this->fcconrep->setDircon($fcconrep['dircon']);
    }
    if (isset($fcconrep['telcon']))
    {
      $this->fcconrep->setTelcon($fcconrep['telcon']);
    }
    if (isset($fcconrep['emacon']))
    {
      $this->fcconrep->setEmacon($fcconrep['emacon']);
    }
    if (isset($fcconrep['codsec']))
    {
      $this->fcconrep->setCodsec($fcconrep['codsec']);
    }
    if (isset($fcconrep['codpar']))
    {
      $this->fcconrep->setCodpar($fcconrep['codpar']);
    }
    if (isset($fcconrep['nitcon']))
    {
      $this->fcconrep->setNitcon($fcconrep['nitcon']);
    }
    if (isset($fcconrep['codmun']))
    {
      $this->fcconrep->setCodmun($fcconrep['codmun']);
    }
    if (isset($fcconrep['codedo']))
    {
      $this->fcconrep->setCodedo($fcconrep['codedo']);
    }
    if (isset($fcconrep['codpai']))
    {
      $this->fcconrep->setCodpai($fcconrep['codpai']);
    }
    if (isset($fcconrep['ciucon']))
    {
      $this->fcconrep->setCiucon($fcconrep['ciucon']);
    }
    if (isset($fcconrep['cpocon']))
    {
      $this->fcconrep->setCpocon($fcconrep['cpocon']);
    }
    if (isset($fcconrep['apocon']))
    {
      $this->fcconrep->setApocon($fcconrep['apocon']);
    }
    if (isset($fcconrep['urlcon']))
    {
      $this->fcconrep->setUrlcon($fcconrep['urlcon']);
    }
    if (isset($fcconrep['naccon']))
    {
      $this->fcconrep->setNaccon($fcconrep['naccon']);
    }
    if (isset($fcconrep['tipcon']))
    {
      $this->fcconrep->setTipcon($fcconrep['tipcon']);
    }
    if (isset($fcconrep['faxcon']))
    {
      $this->fcconrep->setFaxcon($fcconrep['faxcon']);
    }
    if (isset($fcconrep['clacon']))
    {
      $this->fcconrep->setClacon($fcconrep['clacon']);
    }
    if (isset($fcconrep['fecdescon']))
    {
      if ($fcconrep['fecdescon'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcconrep['fecdescon']))
          {
            $value = $dateFormat->format($fcconrep['fecdescon'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcconrep['fecdescon'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcconrep->setFecdescon($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcconrep->setFecdescon(null);
      }
    }
    if (isset($fcconrep['fecactcon']))
    {
      if ($fcconrep['fecactcon'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcconrep['fecactcon']))
          {
            $value = $dateFormat->format($fcconrep['fecactcon'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcconrep['fecactcon'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcconrep->setFecactcon($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcconrep->setFecactcon(null);
      }
    }
    if (isset($fcconrep['stacon']))
    {
      $this->fcconrep->setStacon($fcconrep['stacon']);
    }
    if (isset($fcconrep['origen']))
    {
      $this->fcconrep->setOrigen($fcconrep['origen']);
    }
    if (isset($fcconrep['nomneg']))
    {
      $this->fcconrep->setNomneg($fcconrep['nomneg']);
    }
    if (isset($fcconrep['reccon']))
    {
      $this->fcconrep->setReccon($fcconrep['reccon']);
    }
    if (isset($fcconrep['tem']))
    {
      $this->fcconrep->setTem($fcconrep['tem']);
    }

    if (isset($fcconrep['cedcon']))
    {
      $this->fcconrep->setCedcon($fcconrep['cedcon']);
    }
    if (isset($fcconrep['rifcon']))
    {
      $this->fcconrep->setRifcon($fcconrep['rifcon']);
    }
    if (isset($fcconrep['nomcon']))
    {
      $this->fcconrep->setNomcon($fcconrep['nomcon']);
    }
    if (isset($fcconrep['repcon']))
    {
      $this->fcconrep->setRepcon($fcconrep['repcon']);
    }
    if (isset($fcconrep['dircon']))
    {
      $this->fcconrep->setDircon($fcconrep['dircon']);
    }
    if (isset($fcconrep['telcon']))
    {
      $this->fcconrep->setTelcon($fcconrep['telcon']);
    }
    if (isset($fcconrep['emacon']))
    {
      $this->fcconrep->setEmacon($fcconrep['emacon']);
    }
    if (isset($fcconrep['codsec']))
    {
      $this->fcconrep->setCodsec($fcconrep['codsec']);
    }
    if (isset($fcconrep['codpar']))
    {
      $this->fcconrep->setCodpar($fcconrep['codpar']);
    }
    if (isset($fcconrep['nitcon']))
    {
      $this->fcconrep->setNitcon($fcconrep['nitcon']);
    }
    if (isset($fcconrep['codmun']))
    {
      $this->fcconrep->setCodmun($fcconrep['codmun']);
    }
    if (isset($fcconrep['codedo']))
    {
      $this->fcconrep->setCodedo($fcconrep['codedo']);
    }
    if (isset($fcconrep['codpai']))
    {
      $this->fcconrep->setCodpai($fcconrep['codpai']);
    }
    if (isset($fcconrep['ciucon']))
    {
      $this->fcconrep->setCiucon($fcconrep['ciucon']);
    }
    if (isset($fcconrep['cpocon']))
    {
      $this->fcconrep->setCpocon($fcconrep['cpocon']);
    }
    if (isset($fcconrep['apocon']))
    {
      $this->fcconrep->setApocon($fcconrep['apocon']);
    }
    if (isset($fcconrep['urlcon']))
    {
      $this->fcconrep->setUrlcon($fcconrep['urlcon']);
    }
    if (isset($fcconrep['naccon']))
    {
      $this->fcconrep->setNaccon($fcconrep['naccon']);
    }
    if (isset($fcconrep['tipcon']))
    {
      $this->fcconrep->setTipcon($fcconrep['tipcon']);
    }
    if (isset($fcconrep['faxcon']))
    {
      $this->fcconrep->setFaxcon($fcconrep['faxcon']);
    }
    if (isset($fcconrep['clacon']))
    {
      $this->fcconrep->setClacon($fcconrep['clacon']);
    }
    if (isset($fcconrep['fecdescon']))
    {
      if ($fcconrep['fecdescon'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcconrep['fecdescon']))
          {
            $value = $dateFormat->format($fcconrep['fecdescon'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcconrep['fecdescon'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcconrep->setFecdescon($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcconrep->setFecdescon(null);
      }
    }
    if (isset($fcconrep['fecactcon']))
    {
      if ($fcconrep['fecactcon'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcconrep['fecactcon']))
          {
            $value = $dateFormat->format($fcconrep['fecactcon'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcconrep['fecactcon'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcconrep->setFecactcon($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcconrep->setFecactcon(null);
      }
    }
    if (isset($fcconrep['stacon']))
    {
      $this->fcconrep->setStacon($fcconrep['stacon']);
    }
    if (isset($fcconrep['origen']))
    {
      $this->fcconrep->setOrigen($fcconrep['origen']);
    }
    if (isset($fcconrep['nomneg']))
    {
      $this->fcconrep->setNomneg($fcconrep['nomneg']);
    }
    if (isset($fcconrep['reccon']))
    {
      $this->fcconrep->setReccon($fcconrep['reccon']);
    }
    if (isset($fcconrep['tem']))
    {
      $this->fcconrep->setTem($fcconrep['tem']);
    }

    $sectores = explode("-", $fcconrep['codpar1']);

    if (isset($sectores[0]))
    {
      $this->fcconrep->setCodpar($sectores[0]);
    }
    if (isset($sectores[1]))
    {
      $this->fcconrep->setCodmun($sectores[1]);
    }
    if (isset($sectores[2]))
    {
      $this->fcconrep->setCodedo($sectores[2]);
    }
    if (isset($sectores[3]))
    {
      $this->fcconrep->setCodpai($sectores[3]);
    }



  }



}
