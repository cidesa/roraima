<?php



class NpprimashijosMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpprimashijosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npprimashijos');
		$tMap->setPhpName('Npprimashijos');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npprimashijos_SEQ');

		$tMap->addColumn('PARFAM', 'Parfam', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('EDADDES', 'Edaddes', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('EDADHAS', 'Edadhas', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ESTUDIOS', 'Estudios', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 