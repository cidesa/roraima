<?php



class CccreantMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CccreantMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cccreant');
		$tMap->setPhpName('Cccreant');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cccreant_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FECCRE', 'Feccre', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMCRE', 'Numcre', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('MONCRE', 'Moncre', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALACT', 'Salact', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ESTATU', 'Estatu', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NOMENTFIN', 'Nomentfin', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TIPENT', 'Tipent', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addForeignKey('CCBENEFI_ID', 'CcbenefiId', 'int', CreoleTypes::INTEGER, 'ccbenefi', 'ID', true, null);

	} 
} 