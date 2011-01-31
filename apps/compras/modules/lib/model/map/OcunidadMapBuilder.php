<?php



class OcunidadMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcunidadMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ocunidad');
		$tMap->setPhpName('Ocunidad');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ocunidad_SEQ');

		$tMap->addColumn('CODUNI', 'Coduni', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESUNI', 'Desuni', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('ABRUNI', 'Abruni', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('STAUNI', 'Stauni', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 