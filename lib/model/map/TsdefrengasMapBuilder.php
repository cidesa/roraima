<?php



class TsdefrengasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsdefrengasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tsdefrengas');
		$tMap->setPhpName('Tsdefrengas');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tsdefrengas_SEQ');

		$tMap->addColumn('PAGREPCAJ', 'Pagrepcaj', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CTAREPCAJ', 'Ctarepcaj', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('PAGCHEANT', 'Pagcheant', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CTACHEANT', 'Ctacheant', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('MOVREICAJ', 'Movreicaj', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CTAREICAJ', 'Ctareicaj', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 