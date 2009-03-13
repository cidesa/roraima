<?php



class ForcarocpMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForcarocpMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forcarocp');
		$tMap->setPhpName('Forcarocp');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('DESCAR', 'Descar', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('GRACAR', 'Gracar', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('SUECAR', 'Suecar', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPCAR', 'Tipcar', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 