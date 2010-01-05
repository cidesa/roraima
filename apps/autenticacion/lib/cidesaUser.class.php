<?php
/**
 * Clase para la autenticacion de usuarios, puede ser integrada con otros
 * metodos de autenticacion.
 *
 * @package    Roraima
 * @subpackage autenticacion
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:cidesaUser.class.php 32813 2009-09-08 16:19:47Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class cidesaUser extends sfBasicSecurityUser
{
  public function loginIn($nombre,$passwd,$codemp)
  {
    if(!$this->isAuthenticated())
    {
      $credenciales = $this->autenticate_native($nombre,$passwd,$codemp);
      if($credenciales!='') return true;
      else return false;
    }else return false;
  }

  public function loginOut()
  {
    $this->setAuthenticated(false);
    $this->clearCredentials();
    $this->getAttributeHolder()->remove('urlreferente');
    $this->getAttributeHolder()->clear();

    return true;
  }

  public function autenticate_native($nombre,$passwd,$codemp)
  {
    //$usuarios = ApliUserPeer::doSelectSql('select %s from apli_user limit 3');
    
    $credenciales = '';

    $c = new Criteria();
    $c->add(UsuariosPeer::LOGUSE,strtoupper($nombre).'%',Criteria::LIKE);
    $c->add(UsuariosPeer::PASUSE,'md5'.md5(strtoupper($nombre).$passwd));
    $objUsuario = UsuariosPeer::doSelect($c);
    if($objUsuario)
    {

      if(trim($objUsuario[0]->getLoguse())==strtoupper($nombre)){

        $c = new Criteria();
        $c->add(EmpresaUserPeer::CODEMP,$codemp);
        $objemp = EmpresaUserPeer::doSelectOne($c);

        // TODO: Agregar las credenciales
        // para autenticar a los usuarios en base al
        // tipo de usuario
        $c = new Criteria();
        $c->add(ApliUserPeer::LOGUSE,strtoupper($nombre).'%',Criteria::LIKE);
        $c->add(ApliUserPeer::CODEMP,$codemp);
        $privilegios = ApliUserPeer::doSelectArray($c);
        $credenciales = '';

        if($privilegios){
          foreach ($privilegios as $p) {
            if(trim($p['loguse'])==strtoupper($nombre)){
              $nomopc = $p['nomopc'];
              if($nomopc!='catalogo' && $nomopc!='menu' && $nomopc!='admin')
                $this->addCredential(strtolower($p['nomopc'].'_'.$p['priuse']));
              else $this->addCredential(strtolower($p['nomopc']));
            }
          }
        }
        sfContext::getInstance()->getLogger()->info(Constantes::Autenticacion.' Credenciales = '.$credenciales, 'info');

        // Carga la base de datos segun la empresa
        // Cambia el string de conexion (dns de databases.yml)
        $this->setAttribute('schema', $objemp->getPassemp());
        $this->setAttribute('empresa', $codemp);
        $this->setAttribute('usuario', $objUsuario[0]->getNomuse());
        $this->setAttribute('loguse', $objUsuario[0]->getLoguse());
        $this->setAttribute('usuario_id', $objUsuario[0]->getId());
		$this->setAttribute('contabilidadpresupuesto', sfConfig::get('app_contabilidadpresupuesto'));
		$this->setAttribute('reportes', sfConfig::get('app_reportes'));
		$this->setAttribute('reportes_web', sfConfig::get('app_reportes_web'));
		$this->setAttribute('configemp', sfConfig::get('app_configemp'));

        $_SESSION["x"] = sfConfig::get('app_contabilidadpresupuesto');
        cidesaTools::exitsfile(CIDESA_CONFIG) ? $dir = CIDESA_CONFIG : $dir = sfConfig::get('sf_config_dir');
        $_SESSION["sf_config_dir"] = $dir;
        $_SESSION["codemp"]=$codemp;   //codigo empresa
        $_SESSION["nomemp"]=$objemp->getNomemp();
        //$_SESSION["sesion_usuario"]=$objUsuario[0]->getNomuse();
        $_SESSION["loguse"]=$objUsuario[0]->getLoguse();
        $_SESSION["sesion_usuario"]=session_id();
        $_SESSION["usuario"]=$objUsuario[0]->getNomuse();
        $_SESSION["environment"]=sfConfig::get('sf_environment');
        $_SESSION["schema"]= $objemp->getPassemp();
        $_SESSION["configemp"]=sfConfig::get('app_configemp');
        // Marcamos como autenticado al usuario
        $this->setAuthenticated(true);
        return 'true';

      } else return $credenciales;
    } else return $credenciales;
  }

  public function autenticate_ldap($nombre,$passwd,$codemp)
  {
    $credenciales = '';

    return $credenciales;
  }

  public function autenticate_kerberos($nombre,$passwd,$codemp)
  {
    $credenciales = '';

    return $credenciales;
  }

  public function autenticate_custom($nombre,$passwd,$codemp)
  {
    $credenciales = '';

    return $credenciales;
  }

  public function obtenerModulos()
 {
  $usuario=$this->getAttribute('loguse','');
  $empresa=$this->getAttribute('empresa','');
  $result=array();
  $c= new Criteria();
  $c->add(ApliUserPeer::LOGUSE,$usuario);
  $c->add(ApliUserPeer::NOMOPC,'admin');
  $data=ApliUserPeer::doSelect($c);
  if ($data)
  {
    $sql="select nomapl, nomyml from aplicacion where nomyml!='' order by nomapl ;";
  }
  else
  {
  $sql="select distinct(a.codapl) as codapl, b.nomapl as nomapl, b.nomyml as nomyml from apli_user a, aplicacion b
       where a.loguse='".$usuario."' and a.codemp='".$empresa."' and a.codapl=b.codapl and b.nomyml!='' order by nomapl;";
  }
  Herramientas::BuscarDatos2($sql,&$result);

  return $result;
 }


}
