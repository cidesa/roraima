<?php



class CaunialartMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaunialartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caunialart');
		$tMap->setPhpName('Caunialart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caunialart_SEQ');

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('UNIALT', 'Unialt', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('RELART', 'Relart', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 