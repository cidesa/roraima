<?php

/**
 * biedefconloti actions.
 *
 * @package    Roraima
 * @subpackage biedefconloti
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class biedefconlotiActions extends autobiedefconlotiActions
{
  public function executeIndex()
  {
    return $this->forward('biedefconloti', 'edit');
  }	
  
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
  	$this->setVars();
    $this->bndefconi = $this->getBndefconiOrCreate();


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateBndefconiFromRequest();

      $this->saveBndefconi($this->bndefconi);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('biedefconloti/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('biedefconloti/list');
      }
      else
      {
        return $this->redirect('biedefconloti/edit?id='.$this->bndefconi->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  public function executeCreate()
  {
    return $this->forward('biedefconloti', 'edit');
  }

  /**
   * Función principal para el manejo de la acción save
   * del formulario.
   *
   */
  public function executeSave()
  {
    return $this->forward('biedefconloti', 'edit');
  }


 /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->bndefconi = BndefconiPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->bndefconi);

    try
    {
      $this->deleteBndefconi($this->bndefconi);
      $this->Bitacora('Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Bndefconi. Make sure it does not have any associated items.');
      return $this->forward('biedefconloti', 'list');
    }

    return $this->redirect('biedefconloti/list');
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
  protected function saveBndefconi($bndefconi)
  {
    Muebles::salvarDefConInm($bndefconi);

  }

  protected function deleteBndefconi($bndefconi)
  {
    $bndefconi->delete();
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateBndefconiFromRequest()
  {
    $bndefconi = $this->getRequestParameter('bndefconi');

    if (isset($bndefconi['codact']))
    {
      $this->bndefconi->setCodact($bndefconi['codact']);
    }
    if (isset($bndefconi['codact1']))
    {
      $this->bndefconi->setCodact1($bndefconi['codact1']);
    }
    if (isset($bndefconi['codmue']))
    {
      $this->bndefconi->setCodmue($bndefconi['codmue']);
    }
    if (isset($bndefconi['desmue']))
    {
      $this->bndefconi->setDesmue($bndefconi['desmue']);
    }
    if (isset($bndefconi['ctadepcar']))
    {
      $this->bndefconi->setCtadepcar($bndefconi['ctadepcar']);
    }
    if (isset($bndefconi['descta']))
    {
      $this->bndefconi->setDescta($bndefconi['descta']);
    }
    if (isset($bndefconi['ctadepabo']))
    {
      $this->bndefconi->setCtadepabo($bndefconi['ctadepabo']);
    }
    if (isset($bndefconi['desctaabo']))
    {
      $this->bndefconi->setDesctaabo($bndefconi['desctaabo']);
    }
    if (isset($bndefconi['ctaajucar']))
    {
      $this->bndefconi->setCtaajucar($bndefconi['ctaajucar']);
    }
    if (isset($bndefconi['desctaajucar']))
    {
      $this->bndefconi->setDesctaajucar($bndefconi['desctaajucar']);
    }
    if (isset($bndefconi['ctaajuabo']))
    {
      $this->bndefconi->setCtaajuabo($bndefconi['ctaajuabo']);
    }
    if (isset($bndefconi['desctaajuabo']))
    {
      $this->bndefconi->setDesctaajuabo($bndefconi['desctaajuabo']);
    }
    if (isset($bndefconi['ctarevcar']))
    {
      $this->bndefconi->setCtarevcar($bndefconi['ctarevcar']);
    }
    if (isset($bndefconi['desctarevcar']))
    {
      $this->bndefconi->setDesctarevcar($bndefconi['desctarevcar']);
    }
    if (isset($bndefconi['ctarevabo']))
    {
      $this->bndefconi->setCtarevabo($bndefconi['ctarevabo']);
    }
    if (isset($bndefconi['desctarevabo']))
    {
      $this->bndefconi->setDesctarevabo($bndefconi['desctarevabo']);
    }
    if (isset($bndefconi['ctapercar']))
    {
      $this->bndefconi->setCtapercar($bndefconi['ctapercar']);
    }
    if (isset($bndefconi['desctapercar']))
    {
      $this->bndefconi->setDesctapercar($bndefconi['desctapercar']);
    }
    if (isset($bndefconi['ctaperabo']))
    {
      $this->bndefconi->setCtaperabo($bndefconi['ctaperabo']);
    }
    if (isset($bndefconi['desctaperabo']))
    {
      $this->bndefconi->setDesctaperabo($bndefconi['desctaperabo']);
    }
  }

  protected function getBndefconiOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $bndefconi = new Bndefconi();
    }
    else
    {
      $bndefconi = BndefconiPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($bndefconi);
    }

    return $bndefconi;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $filters = $this->getRequestParameter('filters');

      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/bndefconi/filters');
      $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/bndefconi/filters');
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
     $javascript="";

     if ($this->getRequestParameter('ajax')=='0')
      {
        $this->mascaralonformato = Herramientas::getX_vacio('codins','bndefins','LonAct','001');
          if ($this->mascaralonformato==strlen($this->getRequestParameter('codigo'))){
             $desact=Herramientas::getX('codact','Bndefact','desact',$this->getRequestParameter('codigo'));
          }else{
              $desact="";
              $javascript="alert('El codigo no es de ultimo nivel'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$desact.'",""],["javascript","'.$javascript.'",""]]';
      }

    elseif ($this->getRequestParameter('ajax')=='1')
      {
          $this->mascaralonformato = Herramientas::getX_vacio('codins','bndefins','LonAct','001');
          if ($this->mascaralonformato==strlen($this->getRequestParameter('codigo'))){
             $desact=Herramientas::getX('codact','Bndefact','desact',$this->getRequestParameter('codigo'));
          }else{
              $desact="";
              $javascript="alert('El codigo no es de ultimo nivel'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$desact.'",""],["javascript","'.$javascript.'",""]]';
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
    $this->bndefconi = $this->getBndefconiOrCreate();
    $this->setVars();
    $this->updateBndefconiFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }
}
