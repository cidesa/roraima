<?php



class CcdeduccMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcdeduccMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccdeducc');
		$tMap->setPhpName('Ccdeducc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccdeducc_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMDED', 'Nomded', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('UNIDED', 'Unided', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('MONDED', 'Monded', 'double', CreoleTypes::DOUBLE, false, null);

	} 
} 