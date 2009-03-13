<?php



class NumerosMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NumerosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('numeros');
		$tMap->setPhpName('Numeros');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('numeros_SEQ');

		$tMap->addColumn('NUM', 'Num', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('POS', 'Pos', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('NOMNUM', 'Nomnum', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 