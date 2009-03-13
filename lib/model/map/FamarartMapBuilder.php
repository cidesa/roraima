<?php



class FamarartMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FamarartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('famarart');
		$tMap->setPhpName('Famarart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('famarart_SEQ');

		$tMap->addColumn('CODMAR', 'Codmar', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('NOMMAR', 'Nommar', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 