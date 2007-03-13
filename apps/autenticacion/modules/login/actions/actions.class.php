<?php

/**
 * login actions.
 *
 * @package    cidesa
 * @subpackage login
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class loginActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
  	
    
    $this->getUser()->setAttribute('error', 'Inicializado');
	if ($this->getUser()->isAuthenticated())
	{
		$this->getUser()->loginOut();
		$this->getUser()->setAttribute('error', 'Usuario Logout');
	}else 
	{
		$this->getUser()->setAttribute('error', 'Usuario Sin Autenticar');
	}


  }

  public function executeLogin()
  {
  	
  	// Verificar y validar al usuario con
	// la información del formulario
	$user = $this->getUser();
	if (!$user->isAuthenticated())
	{
		$n = $this->getRequestParameter('textnombre');
		$p = $this->getRequestParameter('textpasswd');
		if($user->loginIn($n,$p,"005"))
		{
			$user->setAttribute('error','Usu Autenticado');
			$this->logMessage('Usuario Autenticado = '.$user->getAttribute('usuario'), 'info');
			$this->redirect('principal');
		}
		else
			$user->setAttribute('error','Error al autenticar 1');
			
	}else $user->setAttribute('error','Error al autenticar 2');
	
	
  }
 
  
}
