<?php



class FordefegrgenMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefegrgenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordefegrgen');
		$tMap->setPhpName('Fordefegrgen');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fordefegrgen_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NIVPROACC', 'Nivproacc', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('DESPROACC', 'Desproacc', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('HASPROACC', 'Hasproacc', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('LONPROACC', 'Lonproacc', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('FORPROACC', 'Forproacc', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NIVACCESP', 'Nivaccesp', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('DESACCESP', 'Desaccesp', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('HASACCESP', 'Hasaccesp', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('LONACCESP', 'Lonaccesp', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('FORACCESP', 'Foraccesp', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NIVSUBACCESP', 'Nivsubaccesp', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('DESSUBACCESP', 'Dessubaccesp', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('HASSUBACCESP', 'Hassubaccesp', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('LONSUBACCESP', 'Lonsubaccesp', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('FORSUBACCESP', 'Forsubaccesp', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NIVUAE', 'Nivuae', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('DESUAE', 'Desuae', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('HASUAE', 'Hasuae', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('LONUAE', 'Lonuae', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('FORUAE', 'Foruae', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('COREST', 'Corest', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('CORSEC', 'Corsec', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('COREQU', 'Corequ', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('DESPAR', 'Despar', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('HASPAR', 'Haspar', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('LONPAR', 'Lonpar', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FORPAR', 'Forpar', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODPARIVA', 'Codpariva', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('MANIVAFOR', 'Manivafor', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PORIVAFOR', 'Porivafor', 'double', CreoleTypes::NUMERIC, false, 5);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 