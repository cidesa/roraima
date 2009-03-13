<?php



class FamarcaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FamarcaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('famarca');
		$tMap->setPhpName('Famarca');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('famarca_SEQ');

		$tMap->addColumn('NOMMAR', 'Nommar', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 