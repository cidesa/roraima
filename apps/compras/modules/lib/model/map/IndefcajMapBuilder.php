<?php



class IndefcajMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.IndefcajMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('indefcaj');
		$tMap->setPhpName('Indefcaj');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('indefcaj_SEQ');

		$tMap->addColumn('CODCAJ', 'Codcaj', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESCAJ', 'Descaj', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 