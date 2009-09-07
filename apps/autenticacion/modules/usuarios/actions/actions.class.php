<?php

/**
 * usuarios actions.
 *
 * @package    Roraima
 * @subpackage usuarios
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class usuariosActions extends autousuariosActions
{
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->usuarios = $this->getUsuariosOrCreate();
    $this->mannivelapr="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('generales',$varemp))
	   if(array_key_exists('mannivapr',$varemp['generales']))
	   {
	   	$this->mannivelapr=$varemp['generales']['mannivapr'];
	   }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateUsuariosFromRequest();

      $this->saveUsuarios($this->usuarios);

      $this->setFlash('notice', 'Your modifications have been saved');

    $this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('usuarios/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('usuarios/list');
      }
      else
      {
        return $this->redirect('usuarios/edit?id='.$this->usuarios->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }



  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateUsuariosFromRequest()
  {
    $usuarios = $this->getRequestParameter('usuarios');
    $this->mannivelapr="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('generales',$varemp))
	   if(array_key_exists('mannivapr',$varemp['generales']))
	   {
	   	$this->mannivelapr=$varemp['generales']['mannivapr'];
	   }

    if (isset($usuarios['loguse']))
    {
      $this->usuarios->setLoguse($usuarios['loguse']);
    }
    if (isset($usuarios['cedemp']))
    {
      $this->usuarios->setCedemp($usuarios['cedemp']);
    }
    if (isset($usuarios['nomuse']))
    {
      $this->usuarios->setNomuse($usuarios['nomuse']);
    }
    if (isset($usuarios['pasuse']))
    {
      $this->usuarios->setPasuse($usuarios['pasuse']);
    }
    $this->usuarios->setApluse('CI0');

    if (isset($usuarios['numemp']))
    {
      $this->usuarios->setNumemp($usuarios['numemp']);
    }
    if (isset($usuarios['diremp']))
    {
      $this->usuarios->setDiremp($usuarios['diremp']);
    }
    if (isset($usuarios['telemp']))
    {
      $this->usuarios->setTelemp($usuarios['telemp']);
    }
    if (isset($usuarios['numuni']))
    {
      $this->usuarios->setNumuni($usuarios['numuni']);
    }
    if (isset($usuarios['codcat']))
    {
      $this->usuarios->setCodcat($usuarios['codcat']);
    }
    if (isset($usuarios['confirm']))
    {
      $this->usuarios->setConfirm($usuarios['confirm']);
    }
    if (isset($usuarios['codniv']))
    {
      $this->usuarios->setCodniv($usuarios['codniv']);
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
  protected function saveUsuarios($usuarios)
  {
    Autenticacion::salvarUsuarios($usuarios);
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
    $javascript=""; $dato="";
	if ($this->getRequestParameter('ajax')=='1')
	{
	  $t= new Criteria();
	  $t->add(SegnivaprPeer::CODNIV,$this->getRequestParameter('codigo'));
	  $data= SegnivaprPeer::doSelectOne($t);
	  if ($data)
	  {
        $dato=$data->getDesniv();
	  }else $javascript="alert('El Nivel de Aprobación no existe'); $('$cajtexcom').value='';";
	  $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
	}
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }

}
