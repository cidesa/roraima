<?php



class CarelartsigaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CarelartsigaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('carelartsiga');
		$tMap->setPhpName('Carelartsiga');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('carelartsiga_SEQ');

		$tMap->addForeignKey('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, 'caregart', 'CODART', true, 20);

		$tMap->addColumn('CODARTQ', 'Codartq', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('DESARTQ', 'Desartq', 'string', CreoleTypes::VARCHAR, true, 1500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 