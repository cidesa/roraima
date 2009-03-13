<?php



class InformsolMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InformsolMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('informsol');
		$tMap->setPhpName('Informsol');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('informsol_SEQ');

		$tMap->addColumn('CODFORMSOL', 'Codformsol', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESFORMSOL', 'Desformsol', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 