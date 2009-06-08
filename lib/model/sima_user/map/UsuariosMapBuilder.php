<?php



class UsuariosMapBuilder {

	
	const CLASS_NAME = 'lib.model.sima_user.map.UsuariosMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('sima_user');

		$tMap = $this->dbMap->addTable('usuarios');
		$tMap->setPhpName('Usuarios');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('usuarios_SEQ');

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('NOMUSE', 'Nomuse', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('APLUSE', 'Apluse', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NUMEMP', 'Numemp', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('PASUSE', 'Pasuse', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DIREMP', 'Diremp', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('TELEMP', 'Telemp', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CEDEMP', 'Cedemp', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('NUMUNI', 'Numuni', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 