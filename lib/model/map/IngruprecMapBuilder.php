<?php



class IngruprecMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.IngruprecMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ingruprec');
		$tMap->setPhpName('Ingruprec');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ingruprec_SEQ');

		$tMap->addColumn('CODGRUP', 'Codgrup', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESGRUP', 'Desgrup', 'string', CreoleTypes::VARCHAR, true, 200);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 