<?php



class NpaumcarMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpaumcarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npaumcar');
		$tMap->setPhpName('Npaumcar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npaumcar_SEQ');

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CANTIDAD', 'Cantidad', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('PORCENTAJE', 'Porcentaje', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('SUECAR', 'Suecar', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('FECAUM', 'Fecaum', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('MOTAUM', 'Motaum', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 