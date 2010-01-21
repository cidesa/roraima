<?php



class CccuadesMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CccuadesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cccuades');
		$tMap->setPhpName('Cccuades');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cccuades_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ORDDES', 'Orddes', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('MONDES', 'Mondes', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('ESTATU', 'Estatu', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('FECDES', 'Fecdes', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODUSUAUT', 'Codusuaut', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('APLDED', 'Aplded', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('NUMCHEDED', 'Numcheded', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('CCCREDIT_ID', 'CccreditId', 'int', CreoleTypes::INTEGER, 'cccredit', 'ID', true, null);

		$tMap->addForeignKey('CCPARTID_ID', 'CcpartidId', 'int', CreoleTypes::INTEGER, 'ccpartid', 'ID', true, null);

		$tMap->addForeignKey('CCPROGRA_ID', 'CcprograId', 'int', CreoleTypes::INTEGER, 'ccprogra', 'ID', true, null);

	} 
} 