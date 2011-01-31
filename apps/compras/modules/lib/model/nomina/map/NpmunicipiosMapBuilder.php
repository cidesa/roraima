<?php



class NpmunicipiosMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpmunicipiosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npmunicipios');
		$tMap->setPhpName('Npmunicipios');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npmunicipios_SEQ');

		$tMap->addColumn('CODMUNICIPIO', 'Codmunicipio', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('NOMBREMUNICIPIO', 'Nombremunicipio', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 