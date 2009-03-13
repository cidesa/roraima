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
	protected function updateUsuariosFromRequest()
  {
    $usuarios = $this->getRequestParameter('usuarios');

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
  }

  protected function saveUsuarios($usuarios)
  {
    Autenticacion::salvarUsuarios($usuarios);
  }

}
