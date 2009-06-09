<?php



class NpacumulacptMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpacumulacptMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npacumulacpt');
		$tMap->setPhpName('Npacumulacpt');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npacumulacpt_SEQ');

		$tMap->addColumn('CODACU', 'Codacu', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('NOMACU', 'Nomacu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('TIPACU', 'Tipacu', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FACTOR', 'Factor', 'double', CreoleTypes::NUMERIC, false, 10);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 