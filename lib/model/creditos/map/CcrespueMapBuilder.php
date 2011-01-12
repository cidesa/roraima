<?php



class CcrespueMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcrespueMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccrespue');
		$tMap->setPhpName('Ccrespue');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccrespue_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ESTATU', 'Estatu', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('NOMFIS', 'Nomfis', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('MONSOL', 'Monsol', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('MONCOB', 'Moncob', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, false, 11);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addForeignKey('CCRESBAN_ID', 'CcresbanId', 'int', CreoleTypes::INTEGER, 'ccresban', 'ID', true, null);

	} 
} 