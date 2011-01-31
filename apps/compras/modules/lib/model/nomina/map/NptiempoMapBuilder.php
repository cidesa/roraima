<?php



class NptiempoMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NptiempoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nptiempo');
		$tMap->setPhpName('Nptiempo');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nptiempo_SEQ');

		$tMap->addColumn('CODTIE', 'Codtie', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DESTIE', 'Destie', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FACTOR', 'Factor', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 