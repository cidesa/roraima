<?php



class CobdesdocMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CobdesdocMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cobdesdoc');
		$tMap->setPhpName('Cobdesdoc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cobdesdoc_SEQ');

		$tMap->addColumn('REFDOC', 'Refdoc', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CODCLI', 'Codcli', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CODDES', 'Coddes', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('FECDES', 'Fecdes', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('MONDES', 'Mondes', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 