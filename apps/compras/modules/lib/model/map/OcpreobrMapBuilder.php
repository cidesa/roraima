<?php



class OcpreobrMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcpreobrMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ocpreobr');
		$tMap->setPhpName('Ocpreobr');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ocpreobr_SEQ');

		$tMap->addColumn('CODOBR', 'Codobr', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CANOBR', 'Canobr', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANCON', 'Cancon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANCONFIN', 'Canconfin', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ADIPAR', 'Adipar', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('COSUNI', 'Cosuni', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('COSUNIFIN', 'Cosunifin', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('MONPRE', 'Monpre', 'double', CreoleTypes::NUMERIC, false, 36);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 