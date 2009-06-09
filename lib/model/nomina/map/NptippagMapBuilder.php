<?php



class NptippagMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NptippagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nptippag');
		$tMap->setPhpName('Nptippag');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nptippag_SEQ');

		$tMap->addColumn('CODTIPPAG', 'Codtippag', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('NOMTIPPAG', 'Nomtippag', 'string', CreoleTypes::VARCHAR, true, 18);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 