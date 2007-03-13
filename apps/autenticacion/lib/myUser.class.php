<?php

class myUser extends sfBasicSecurityUser
{
	public function loginIn($nombre,$passwd,$empresa)
	{
		if(!$this->isAuthenticated())
		{
			$c = new Criteria();
			$c->add(UsuariosPeer::LOGUSE,strtoupper($nombre));
			$c->add(UsuariosPeer::PASUSE,str_pad($passwd,10,' ',STR_PAD_RIGHT));
			$objUsuario = UsuariosPeer::doSelect($c); 
			if($objUsuario)
			{
				// TODO: Agregar las credenciales 
				// para autenticar a los usuarios en base al
				// tipo de usuario
				$c = new Criteria();
				$objApli_user = new Apli_users();
				$c->add(Apli_usersPeer::LOGUSE,$nombre);
				$c->add(Apli_usersPeer::CODEMP,$empresa);
				$objApli_user = Apli_usersPeer::doSelect($c);
				// $objApli_user contiene la info de acceso del
				// usuario a los diferentes formularios
				// con esta informacion se debe generarar
				// las credenciales

				// Carga la base de datos segun la empresa
				// Cambia el string de conexion (dns de databases.yml) 
				$bd = "SIMA" + $empresa;
				$con = sfContext::getInstance()->getDatabaseConnection('sima');
				//print('Conexion = '.$con->getParameter('database'));
				//$con->setParameter('database',$bd);

				$this->setAttribute('usuario', $objUsuario[0]->getNomuse());
				$this->addCredential('admin');
				
				// Marcamos como autenticado al usuario
				$this->setAuthenticated(true);
				return true;
			} else return false;
		}else return false;
	}
	
	public function loginOut()
	{
		$this->setAuthenticated(false);
		$this->clearCredentials();
	}
	
}
