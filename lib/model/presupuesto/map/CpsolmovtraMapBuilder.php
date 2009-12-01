<?php



class CpsolmovtraMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpsolmovtraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpsolmovtra');
		$tMap->setPhpName('Cpsolmovtra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpsolmovtra_SEQ');

		$tMap->addForeignKey('REFTRA', 'Reftra', 'string', CreoleTypes::VARCHAR, 'cpsoltrasla', 'REFTRA', true, 8);

		$tMap->addColumn('CODORI', 'Codori', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODDES', 'Coddes', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('MONMOV', 'Monmov', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAMOV', 'Stamov', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 