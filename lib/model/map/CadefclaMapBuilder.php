<?php



class CadefclaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CadefclaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cadefcla');
		$tMap->setPhpName('Cadefcla');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cadefcla_SEQ');

		$tMap->addColumn('CODCLA', 'Codcla', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESCLA', 'Descla', 'string', CreoleTypes::VARCHAR, false, 2500);

		$tMap->addColumn('TIPCLA', 'Tipcla', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 