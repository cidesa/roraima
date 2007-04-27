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
	
	$c = new Criteria();
	$lista_emp = EmpresaUserPeer::doSelect($c);
	
	$this->empresas = array();
	
	foreach($lista_emp as $obj_emp)
	{
		$this->empresas += array($obj_emp->getCodemp() => $obj_emp->getNomemp());    
	}

  }

  public function executeLogin()
  {
  	
  	// Verificar y validar al usuario con
	// la información del formulario
	$user = $this->getUser();
	if (!$user->isAuthenticated())
	{
		$n = $this->getRequestParameter('textnombre','tabla');
		$p = $this->getRequestParameter('textpasswd', 'passwd');
		$emp = $this->getRequestParameter('selectemp', 'empresa');
		
		if($user->loginIn($n,$p,$emp))
		{
			$user->setAttribute('error','Usu Autenticado');
			$this->logMessage(Constantes::Autenticacion.'Usuario Autenticado = '.$user->getAttribute('usuario').' Schema = '.$user->getAttribute('schema'), 'info');
			$this->redirect('principal');
			return sfView::SUCCESS;
		}
		else
			$user->setAttribute('error','Error al autenticar 1');
	}else $user->setAttribute('error','Error al autenticar 2');
	return sfView::SUCCESS;
	
  }
  
  public function executeLogout()
  {

  	// Verificar y validar al usuario con
	// la información del formulario
	$user = $this->getUser();
	if ($user->isAuthenticated())
	{
		$usu = $this->getRequestParameter('usuario', 'usuario');
		
		if($user->loginOut())
		{
			$user->setAttribute('error','Usuario Sin Autenticar');
			$this->logMessage(Constantes::Autenticacion.'Usuario Sesion Cerrada = '.$usu.' Schema = '.$user->getAttribute('schema'), 'info');
		}
			
	}
  	
	$this->redirect('login');
	return sfView::SUCCESS;
  	
  }
 
  
}
