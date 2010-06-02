<?php



class ViacalrubMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViacalrubMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viacalrub');
		$tMap->setPhpName('Viacalrub');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viacalrub_SEQ');

		$tMap->addColumn('CODRUB', 'Codrub', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODNIVTRA', 'Codnivtra', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CANUNITRI', 'Canunitri', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VALUNITRI', 'Valunitri', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 