<?php



class OpconpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpconpagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('opconpag');
		$tMap->setPhpName('Opconpag');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('opconpag_SEQ');

		$tMap->addColumn('CODCONCEPTO', 'Codconcepto', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NOMCONCEPTO', 'Nomconcepto', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 