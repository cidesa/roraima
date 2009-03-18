<?php

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
        $privilegios = ApliUserPeer::doSelect($c);
        $credenciales = '';

        if($privilegios){
          foreach ($privilegios as $p) {
            if(trim($p->getLoguse())==strtoupper($nombre)){
              $nomopc = $p->getNomopc();
              if($nomopc!='catalogo' && $nomopc!='menu' && $nomopc!='admin')
                $this->addCredential(strtolower($p->getNomopc().'_'.$p->getPriuse()));
              else $this->addCredential(strtolower($p->getNomopc()));
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

        $_SESSION["x"] = sfConfig::get('app_contabilidadpresupuesto');
        cidesaTools::exitsfile(implode("/",explode("/",sfConfig::get('sf_config_dir'),-2))."/"._CIDESA_CONFIG_) ? $dir = implode("/",explode("/",sfConfig::get('sf_config_dir'),-2))."/"._CIDESA_CONFIG_ : $dir = sfConfig::get('sf_config_dir');
        $_SESSION["sf_config_dir"] = $dir;
        $_SESSION["codemp"]=$codemp;   //codigo empresa
        $_SESSION["nomemp"]=$objemp->getNomemp();
        //$_SESSION["sesion_usuario"]=$objUsuario[0]->getNomuse();
        $_SESSION["loguse"]=$objUsuario[0]->getLoguse();
        $_SESSION["sesion_usuario"]=session_id();
        $_SESSION["usuario"]=$objUsuario[0]->getNomuse();
        $_SESSION["environment"]=sfConfig::get('sf_environment');
        $_SESSION["schema"]= $objemp->getPassemp();
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
