<?php



class CcprioridadMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcprioridadMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccprioridad');
		$tMap->setPhpName('Ccprioridad');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccprioridad_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMPRI', 'Nompri', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ALIAS', 'Alias', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('DESPRI', 'Despri', 'string', CreoleTypes::VARCHAR, false, 255);

	} 
} 