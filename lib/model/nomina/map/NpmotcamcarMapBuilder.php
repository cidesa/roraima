<?php



class NpmotcamcarMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpmotcamcarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npmotcamcar');
		$tMap->setPhpName('Npmotcamcar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npmotcamcar_SEQ');

		$tMap->addColumn('CODMOTCAMCAR', 'Codmotcamcar', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESMOTCAMCAR', 'Desmotcamcar', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 