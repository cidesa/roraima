<?php



class CcconfconMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcconfconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccconfcon');
		$tMap->setPhpName('Ccconfcon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccconfcon_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DESCRI', 'Descri', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CUECON', 'Cuecon', 'string', CreoleTypes::VARCHAR, true, 60);

		$tMap->addColumn('ATRIBU', 'Atribu', 'string', CreoleTypes::VARCHAR, true, 50);

	} 
} 