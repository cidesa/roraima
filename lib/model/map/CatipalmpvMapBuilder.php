<?php



class CatipalmpvMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CatipalmpvMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catipalmpv');
		$tMap->setPhpName('Catipalmpv');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catipalmpv_SEQ');

		$tMap->addColumn('CODTIPPV', 'Codtippv', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMTIPPV', 'Nomtippv', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('METDES', 'Metdes', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('METHAS', 'Methas', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 