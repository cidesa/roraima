<?php



class CcsolliqMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcsolliqMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccsolliq');
		$tMap->setPhpName('Ccsolliq');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccsolliq_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NUMSOLLIQ', 'Numsolliq', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('FECLIQ', 'Fecliq', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ESTATU', 'Estatu', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONCAPTRA', 'Moncaptra', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONACTFIJ', 'Monactfij', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONTRAUTI', 'Montrauti', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONOTR', 'Monotr', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESDOCANE', 'Desdocane', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCCREDIT_ID', 'CccreditId', 'int', CreoleTypes::INTEGER, 'cccredit', 'ID', true, null);

		$tMap->addForeignKey('CCSOLDES_ID', 'CcsoldesId', 'int', CreoleTypes::INTEGER, 'ccsoldes', 'ID', true, null);

		$tMap->addForeignKey('CCCUADES_ID', 'CccuadesId', 'int', CreoleTypes::INTEGER, 'cccuades', 'ID', true, null);

		$tMap->addForeignKey('CCUSUINT_ID', 'CcusuintId', 'int', CreoleTypes::INTEGER, 'ccusuint', 'ID', true, null);

	} 
} 