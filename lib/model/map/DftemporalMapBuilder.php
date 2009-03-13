<?php



class DftemporalMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DftemporalMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('dftemporal');
		$tMap->setPhpName('Dftemporal');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('dftemporal_SEQ');

		$tMap->addColumn('CODIGO', 'Codigo', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ABR', 'Abr', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('BEN', 'Ben', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('FECHAREC', 'Fecharec', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('ESTAD', 'Estad', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NOMTAB', 'Nomtab', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('UNI', 'Uni', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('UNIDAD', 'Unidad', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('UNIDADORI', 'Unidadori', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('VIDA', 'Vida', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 