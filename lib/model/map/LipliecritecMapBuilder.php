<?php



class LipliecritecMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LipliecritecMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lipliecritec');
		$tMap->setPhpName('Lipliecritec');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lipliecritec_SEQ');

		$tMap->addColumn('NUMPLIE', 'Numplie', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMEXP', 'Numexp', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODCRI', 'Codcri', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('PUNTUA', 'Puntua', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORCEN', 'Porcen', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('LIMIT', 'Limit', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 