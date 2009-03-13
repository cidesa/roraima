<?php



class FaproaltMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FaproaltMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faproalt');
		$tMap->setPhpName('Faproalt');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faproalt_SEQ');

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODALT', 'Codalt', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 