<?php



class OcproveeMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcproveeMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ocprovee');
		$tMap->setPhpName('Ocprovee');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ocprovee_SEQ');

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NOMPRO', 'Nompro', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('RIFPRO', 'Rifpro', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NITPRO', 'Nitpro', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('DIRPRO', 'Dirpro', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELPRO', 'Telpro', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FAXPRO', 'Faxpro', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('LIMCRE', 'Limcre', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('REGMER', 'Regmer', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TOMREG', 'Tomreg', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('FOLREG', 'Folreg', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CAPSUS', 'Capsus', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CAPPAG', 'Cappag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('RIFREPLEG', 'Rifrepleg', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NOMREPLEG', 'Nomrepleg', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRREPLEG', 'Dirrepleg', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECINSCIR', 'Fecinscir', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMINSCIR', 'Numinscir', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NACPRO', 'Nacpro', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODORD', 'Codord', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODPERCON', 'Codpercon', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODTIPREC', 'Codtiprec', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODRAM', 'Codram', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('NROCEI', 'Nrocei', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 