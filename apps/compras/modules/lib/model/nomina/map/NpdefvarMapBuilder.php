<?php



class NpdefvarMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpdefvarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npdefvar');
		$tMap->setPhpName('Npdefvar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdefvar_SEQ');

		$tMap->addColumn('CODVAR', 'Codvar', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESVAR', 'Desvar', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('VALOR1', 'Valor1', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VALOR2', 'Valor2', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VALOR3', 'Valor3', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VALOR4', 'Valor4', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VALOR5', 'Valor5', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 