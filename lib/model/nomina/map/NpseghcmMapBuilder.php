<?php



class NpseghcmMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpseghcmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npseghcm');
		$tMap->setPhpName('Npseghcm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npseghcm_SEQ');

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODCONAPO', 'Codconapo', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('TIPPAR', 'Tippar', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('EDADDES', 'Edaddes', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EDADHAS', 'Edadhas', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CUOTA', 'Cuota', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MONTOTOTAL', 'Montototal', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 