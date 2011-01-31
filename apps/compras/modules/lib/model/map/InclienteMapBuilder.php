<?php



class InclienteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InclienteMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('incliente');
		$tMap->setPhpName('Incliente');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('incliente_SEQ');

		$tMap->addColumn('CODCLI', 'Codcli', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMCLI', 'Nomcli', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('RIFCLI', 'Rifcli', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('DIRCLI', 'Dircli', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELCLI', 'Telcli', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FAXCLI', 'Faxcli', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('LIMCRE', 'Limcre', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODCTACON', 'Codctacon', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTAORD', 'Codctaord', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTAPER', 'Codctaper', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CIRJUD', 'Cirjud', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('REGMER', 'Regmer', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('TOMREG', 'Tomreg', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('FOLREG', 'Folreg', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CAPSUS', 'Capsus', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CAPPAG', 'Cappag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('RIFREPLEG', 'Rifrepleg', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NOMREPLEG', 'Nomrepleg', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRREPLEG', 'Dirrepleg', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELREPLEG', 'Telrepleg', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('EMAILREPLEG', 'Emailrepleg', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('RIFPERCON', 'Rifpercon', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NOMPERCON', 'Nompercon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRPERCON', 'Dirpercon', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELPERCON', 'Telpercon', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('EMAILPERCON', 'Emailpercon', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECVENREG', 'Fecvenreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODGRUPREC', 'Codgruprec', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CTACONASOC', 'Ctaconasoc', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTAORDASOC', 'Ctaordasoc', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTAPERASOC', 'Ctaperasoc', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTAORDART', 'Ctaordart', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTAPERART', 'Ctaperart', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTAORDCONT', 'Ctaordcont', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTAPERCONT', 'Ctapercont', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('NACPRO', 'Nacpro', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ACTPROF', 'Actprof', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODTIPEMP', 'Codtipemp', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 