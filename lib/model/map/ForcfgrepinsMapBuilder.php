<?php



class ForcfgrepinsMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForcfgrepinsMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forcfgrepins');
		$tMap->setPhpName('Forcfgrepins');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('forcfgrepins_SEQ');

		$tMap->addColumn('NROFOR', 'Nrofor', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CUENTA', 'Cuenta', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('ORDEN', 'Orden', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 