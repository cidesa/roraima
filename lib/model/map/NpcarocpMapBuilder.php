<?php



class NpcarocpMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpcarocpMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npcarocp');
		$tMap->setPhpName('Npcarocp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npcarocp_SEQ');

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('DESCAR', 'Descar', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('GRACAR', 'Gracar', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('SUECAR', 'Suecar', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPCAR', 'Tipcar', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('FUNCAR', 'Funcar', 'string', CreoleTypes::VARCHAR, false, 2500);

		$tMap->addColumn('ATRCAR', 'Atrcar', 'string', CreoleTypes::VARCHAR, false, 2500);

		$tMap->addColumn('ACTCAR', 'Actcar', 'string', CreoleTypes::VARCHAR, false, 2500);

		$tMap->addColumn('RESCAR', 'Rescar', 'string', CreoleTypes::VARCHAR, false, 2500);

		$tMap->addColumn('ANOCAR', 'Anocar', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 