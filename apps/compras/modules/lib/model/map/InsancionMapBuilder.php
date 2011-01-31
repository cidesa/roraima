<?php



class InsancionMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InsancionMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('insancion');
		$tMap->setPhpName('Insancion');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('insancion_SEQ');

		$tMap->addColumn('CODSAN', 'Codsan', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESSAN', 'Dessan', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 