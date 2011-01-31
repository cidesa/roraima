<?php



class NpporhcmMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpporhcmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npporhcm');
		$tMap->setPhpName('Npporhcm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npporhcm_SEQ');

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('TIPCAR', 'Tipcar', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('TIPPAR', 'Tippar', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('EDADES', 'Edades', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EDAHAS', 'Edahas', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORCUB', 'Porcub', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DISSUS', 'Dissus', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 