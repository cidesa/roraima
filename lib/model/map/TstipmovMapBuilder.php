<?php



class TstipmovMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TstipmovMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tstipmov');
		$tMap->setPhpName('Tstipmov');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tstipmov_SEQ');

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIP', 'Destip', 'string', CreoleTypes::VARCHAR, true, 40);

		$tMap->addColumn('DEBCRE', 'Debcre', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('ORDEN', 'Orden', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('ESCHEQUE', 'Escheque', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 