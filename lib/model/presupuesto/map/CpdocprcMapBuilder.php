<?php



class CpdocprcMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpdocprcMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpdocprc');
		$tMap->setPhpName('Cpdocprc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpdocprc_SEQ');

		$tMap->addColumn('TIPPRC', 'Tipprc', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMEXT', 'Nomext', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('NOMABR', 'Nomabr', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 