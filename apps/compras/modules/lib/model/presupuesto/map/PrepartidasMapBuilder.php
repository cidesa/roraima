<?php



class PrepartidasMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.PrepartidasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('prepartidas');
		$tMap->setPhpName('Prepartidas');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('prepartidas_SEQ');

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('NOMPAR', 'Nompar', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 