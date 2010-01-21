<?php



class CccargoMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CccargoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cccargo');
		$tMap->setPhpName('Cccargo');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cccargo_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMCAR', 'Nomcar', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESCAR', 'Descar', 'string', CreoleTypes::VARCHAR, false, null);

	} 
} 