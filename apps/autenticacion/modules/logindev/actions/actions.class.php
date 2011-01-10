<?php

/**
 * Formulario de inicio de sesion
 *
 * @package    Roraima
 * @subpackage autenticacion
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 32813 2009-09-08 16:19:47Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class logindevActions extends sfActions
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

      if(SF_ENVIRONMENT=='dev')
      {
          $this->db=array(''=>'Por Defecto...');

          $sql="select datname from pg_catalog.pg_database where datistemplate=false and datname<>'postgres' order by datname";
          if(H::BuscarDatos($sql, $rs))
          {
             foreach($rs as $r)
             {
                $this->db += array($r['datname']=>$r['datname']);
             }
          }

          $c = new Criteria();
          $c->addDescendingOrderByColumn(EmpresaUserPeer::CODEMP);
          $lista_emp = EmpresaUserPeer::doSelect($c);

          $this->empresas = array();

          foreach($lista_emp as $obj_emp)
          {
            $this->empresas += array($obj_emp->getCodemp() => $obj_emp->getNomemp());
          }

      }else
      {
          $c = new Criteria();
          $c->addDescendingOrderByColumn(EmpresaUserPeer::CODEMP);
          $lista_emp = EmpresaUserPeer::doSelect($c);

          $this->empresas = array();

          foreach($lista_emp as $obj_emp)
          {
            $this->empresas += array($obj_emp->getCodemp() => $obj_emp->getNomemp());
          }
      }

  }

  public function executeEmpresa()
  {
       $database= $this->getRequestParameter('codigo');
       if($database)
       {
          $db = sfContext::getInstance()->getDatabaseManager()->getDatabase('propel');
          $db->setConnectionParameter('database',$database);

          $this->empresas=array();
          $sql="SELECT  distinct substr(udt_schema,5) as codemp,udt_schema as nomemp FROM information_schema.attributes order by codemp";
          if(H::BuscarDatos($sql, $rs))
          {
             foreach($rs as $r)
             {
                $this->empresas += array($r['codemp']=>$r['nomemp']);
             }
          }
       }else
       {
          $c = new Criteria();
          $c->addDescendingOrderByColumn(EmpresaUserPeer::CODEMP);
          $lista_emp = EmpresaUserPeer::doSelect($c);

          $this->empresas = array();

          foreach($lista_emp as $obj_emp)
          {
            $this->empresas += array($obj_emp->getCodemp() => $obj_emp->getNomemp());
          }
       }

  }

  public function executeLogin()
  {

    // Verificar y validar al usuario con
  // la informaciÃ³n del formulario
  $user = $this->getUser();
  if (!$user->isAuthenticated())
  {
    $n = $this->getRequestParameter('textnombre','tabla');
    $p = $this->getRequestParameter('textpasswd', 'passwd');
    $emp = $this->getRequestParameter('selectemp', 'empresa');
    $db = $this->getRequestParameter('selectdb', '');


    if($user->loginIn($n,$p,$emp,$db))
    {
        // TODO: Validar que al intentar 3 veces desde una misma IP de origen dentro de un rango de tiempo preestablecido no deje entrar en un peridodo de tiempo X
      $user->setAttribute('error','Usu Autenticado');
      $this->logMessage(Constantes::Autenticacion.'Usuario Autenticado = '.$user->getAttribute('usuario').', Schema = '.$user->getAttribute('schema').', IP = '.$this->getRequest()->getHttpHeader('addr','remote'), 'info');
      if($user->getAttribute('urlreferente','')!='') $this->redirect($user->getAttribute('urlreferente',''));
      else $this->redirect('principal');
      $user->getAttributeHolder()->remove('urlreferente');
      //return sfView::SUCCESS;
    }
    else
    {
      $user->setAttribute('error','Error al autenticar');
      $this->logMessage('Falla de Autenticacion, Login = '.$n.', IP Origen = '.$this->getRequest()->getHttpHeader('addr','remote'), 'info');
      $this->redirect('logindev');
    }

  }else {
    //$user->setAttribute('error','Error al autenticar');
    $this->redirect('principal');
  }


  }

  public function executeLogout()
  {

    // Verificar y validar al usuario con
  // la informaciÃ³n del formulario
  $user = $this->getUser();
  if ($user->isAuthenticated())
  {
    $usu = $this->getRequestParameter('usuario', 'usuario');

    if($user->loginOut())
    {
      $user->setAttribute('error','Usuario Sin Autenticar');
      $this->logMessage(Constantes::Autenticacion.'Usuario Sesion Cerrada = '.$usu.' Schema = '.$user->getAttribute('schema'), 'info');
    }
    session_unset();

  }

  $this->redirect('logindev');
  return sfView::SUCCESS;

  }

  public function executeErrorautenticacion()
  {

  }

}
