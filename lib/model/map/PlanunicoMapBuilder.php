<?php



class PlanunicoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PlanunicoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('planunico');
		$tMap->setPhpName('Planunico');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('planunico_SEQ');

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('NOMPRE', 'Nompre', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('CODNEW', 'Codnew', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 