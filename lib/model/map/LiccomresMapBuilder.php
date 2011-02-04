<?php



class LiccomresMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LiccomresMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liccomres');
		$tMap->setPhpName('Liccomres');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liccomres_SEQ');

		$tMap->addColumn('CODCOMRES', 'Codcomres', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESCOMRES', 'Descomres', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('PORCENTAJE', 'Porcentaje', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 