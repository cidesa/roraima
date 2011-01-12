<?php



class CaequiartMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaequiartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caequiart');
		$tMap->setPhpName('Caequiart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caequiart_SEQ');

		$tMap->addColumn('CODQPR', 'Codqpr', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 