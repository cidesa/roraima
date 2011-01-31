<?php



class OpfacturMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpfacturMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('opfactur');
		$tMap->setPhpName('Opfactur');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('opfactur_SEQ');

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECFAC', 'Fecfac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMFAC', 'Numfac', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NUMCTR', 'Numctr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TIPTRA', 'Tiptra', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('TOTFAC', 'Totfac', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('EXEIVA', 'Exeiva', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('BASIMP', 'Basimp', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('PORIVA', 'Poriva', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('MONIVA', 'Moniva', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('MONRET', 'Monret', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('BASLTF', 'Basltf', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('PORLTF', 'Porltf', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('MONLTF', 'Monltf', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('BASISLR', 'Basislr', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('PORISLR', 'Porislr', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('MONISLR', 'Monislr', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('CODISLR', 'Codislr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('RIFALT', 'Rifalt', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FACAFE', 'Facafe', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('OBSERVACION', 'Observacion', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('BASIRS', 'Basirs', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('PORIRS', 'Porirs', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('MONIRS', 'Monirs', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('CODIRS', 'Codirs', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 