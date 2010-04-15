<?php



class CsdetsolMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CsdetsolMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('csdetsol');
		$tMap->setPhpName('Csdetsol');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CANTIDAD', 'Cantidad', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('FORMATO', 'Formato', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PROGRAMA', 'Programa', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CANPRE', 'Canpre', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 