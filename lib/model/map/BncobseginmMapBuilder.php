<?php



class BncobseginmMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BncobseginmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bncobseginm');
		$tMap->setPhpName('Bncobseginm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bncobseginm_SEQ');

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODINM', 'Codinm', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NROSEGMUE', 'Nrosegmue', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('CODCOB', 'Codcob', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
