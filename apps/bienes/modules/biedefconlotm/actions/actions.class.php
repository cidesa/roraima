<?php

/**
 * biedefconlotm actions.
 *
 * @package    Roraima
 * @subpackage biedefconlotm
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class biedefconlotmActions extends autobiedefconlotmActions
{
  public function executeIndex()
  {
    return $this->forward('biedefconlotm', 'edit');
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
  	$this->setVars();
    $this->bndefcon = $this->getBndefconOrCreate();


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateBndefconFromRequest();

      $this->saveBndefcon($this->bndefcon);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('biedefconlotm/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('biedefconlotm/list');
      }
      else
      {
        return $this->redirect('biedefconlotm/edit?id='.$this->bndefcon->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  public function executeCreate()
  {
    return $this->forward('biedefconlotm', 'edit');
  }

  /**
   * Función principal para el manejo de la acción save
   * del formulario.
   *
   */
  public function executeSave()
  {
    return $this->forward('biedefconlotm', 'edit');
  }


 /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->bndefcon = BndefconPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->bndefcon);

    try
    {
      $this->deleteBndefcon($this->bndefcon);
      $this->Bitacora('Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Bndefcon. Make sure it does not have any associated items.');
      return $this->forward('biedefconlotm', 'list');
    }

    return $this->redirect('biedefconlotm/list');
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
  protected function saveBndefcon($bndefcon)
  {
    $bndefcon->save();

  }

  protected function deleteBndefcon($bndefcon)
  {
    $bndefcon->delete();
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateBndefconFromRequest()
  {
    $bndefcon = $this->getRequestParameter('bndefcon');

    if (isset($bndefcon['codact']))
    {
      $this->bndefcon->setCodact($bndefcon['codact']);
    }
    if (isset($bndefcon['codmue']))
    {
      $this->bndefcon->setCodmue($bndefcon['codmue']);
    }
    if (isset($bndefcon['desmue']))
    {
      $this->bndefcon->setDesmue($bndefcon['desmue']);
    }
    if (isset($bndefcon['ctadepcar']))
    {
      $this->bndefcon->setCtadepcar($bndefcon['ctadepcar']);
    }
    if (isset($bndefcon['descta']))
    {
      $this->bndefcon->setDescta($bndefcon['descta']);
    }
    if (isset($bndefcon['ctadepabo']))
    {
      $this->bndefcon->setCtadepabo($bndefcon['ctadepabo']);
    }
    if (isset($bndefcon['desctaabo']))
    {
      $this->bndefcon->setDesctaabo($bndefcon['desctaabo']);
    }
    if (isset($bndefcon['ctaajucar']))
    {
      $this->bndefcon->setCtaajucar($bndefcon['ctaajucar']);
    }
    if (isset($bndefcon['desctaajucar']))
    {
      $this->bndefcon->setDesctaajucar($bndefcon['desctaajucar']);
    }
    if (isset($bndefcon['ctaajuabo']))
    {
      $this->bndefcon->setCtaajuabo($bndefcon['ctaajuabo']);
    }
    if (isset($bndefcon['desctaajuabo']))
    {
      $this->bndefcon->setDesctaajuabo($bndefcon['desctaajuabo']);
    }
    if (isset($bndefcon['ctarevcar']))
    {
      $this->bndefcon->setCtarevcar($bndefcon['ctarevcar']);
    }
    if (isset($bndefcon['desctarevcar']))
    {
      $this->bndefcon->setDesctarevcar($bndefcon['desctarevcar']);
    }
    if (isset($bndefcon['ctarevabo']))
    {
      $this->bndefcon->setCtarevabo($bndefcon['ctarevabo']);
    }
    if (isset($bndefcon['desctarevabo']))
    {
      $this->bndefcon->setDesctarevabo($bndefcon['desctarevabo']);
    }
    if (isset($bndefcon['ctapercar']))
    {
      $this->bndefcon->setCtapercar($bndefcon['ctapercar']);
    }
    if (isset($bndefcon['desctapercar']))
    {
      $this->bndefcon->setDesctapercar($bndefcon['desctapercar']);
    }
    if (isset($bndefcon['ctaperabo']))
    {
      $this->bndefcon->setCtaperabo($bndefcon['ctaperabo']);
    }
    if (isset($bndefcon['desctaperabo']))
    {
      $this->bndefcon->setDesctaperabo($bndefcon['desctaperabo']);
    }
  }

  protected function getBndefconOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $bndefcon = new Bndefcon();
    }
    else
    {
      $bndefcon = BndefconPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($bndefcon);
    }

    return $bndefcon;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $filters = $this->getRequestParameter('filters');

      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/bndefcon/filters');
      $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/bndefcon/filters');
    }
  }

  public function setVars()
  {
      $this->mascaracatalogo = Herramientas::getX_vacio('codins','bndefins','ForAct','001');
      $this->mascaraformatoubi = Herramientas::getX_vacio('codins','bndefins','ForUbi','001');
      $this->mascaralonformato = Herramientas::getX_vacio('codins','bndefins','LonAct','001');
      $this->mascaralonubicacion = Herramientas::getX_vacio('codins','bndefins','LonUbi','001');
  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('CODACT','Bndefact','desact',trim($this->getRequestParameter('bndefact[codact]')));
      }else
    if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('CODCOB','Bncobseg','codcob',str_pad(trim($this->getRequestParameter('bnseginm[cobseginm]')),4,'0',STR_PAD_LEFT));
      }else
    if ($this->getRequestParameter('ajax')=='3')
      {
       //$this->tags=Herramientas::autocompleteAjax('CODCOB','Bncobseg','codcob',trim($this->getRequestParameter('bnseginm[cobsegmue]')));
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
   $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');

     if ($this->getRequestParameter('ajax')=='0')
      {
        $desact=Herramientas::getX('codact','Bndefact','desact',$this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos.'","'.$desact.'",""]]';
      }

    elseif ($this->getRequestParameter('ajax')=='1')
      {
        $desact=Herramientas::getX('codact','Bndefact','desact',$this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos.'","'.$desact.'",""]]';
      }
      elseif ($this->getRequestParameter('ajax')=='2')
      {
        $descta=Herramientas::getX('codcta','Contabb','descta',$this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos.'","'.$descta.'",""]]';
      }
    elseif ($this->getRequestParameter('ajax')=='3')
      {
        $descta=Herramientas::getX('codcta','Contabb','descta',$this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos.'","'.$descta.'",""]]';
      }

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
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
    $this->bndefcon = $this->getBndefconOrCreate();
    $this->setVars();
    $this->updateBndefconFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

}
