<?php



class CobclientMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CobclientMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('cobclient');
		$tMap->setPhpName('Cobclient');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cobclient_SEQ');

		$tMap->addColumn('CODCLI', 'Codcli', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NOMCLI', 'Nomcli', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('RIFCLI', 'Rifcli', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NITCLI', 'Nitcli', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('DIRCLI', 'Dircli', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELCLI', 'Telcli', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FAXCLI', 'Faxcli', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TIPPER', 'Tipper', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NACCLI', 'Naccli', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('LIMCRE', 'Limcre', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 18);

		$tMap->addColumn('REGMER', 'Regmer', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TOMREG', 'Tomreg', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('FOLREG', 'Folreg', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CAPSUS', 'Capsus', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CAPPAG', 'Cappag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CIREPLEG', 'Cirepleg', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NOMREPLEG', 'Nomrepleg', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRREPLEG', 'Dirrepleg', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('RIFFIA', 'Riffia', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NOMFIA', 'Nomfia', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRFIA', 'Dirfia', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELFIA', 'Telfia', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CODCIU', 'Codciu', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODPAI', 'Codpai', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECNAC', 'Fecnac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TIPCLI', 'Tipcli', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODTIPREC', 'Codtiprec', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODORDMERCON', 'Codordmercon', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODPERMERCON', 'Codpermercon', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 