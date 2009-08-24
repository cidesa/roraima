<?php

/**
 * usuarios actions.
 *
 * @package    siga
 * @subpackage usuarios
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class usuariosActions extends autousuariosActions
{
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

  protected function saveUsuarios($usuarios)
  {
    Autenticacion::salvarUsuarios($usuarios);
  }

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
