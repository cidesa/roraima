<?php



class CcamoactrespMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcamoactrespMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccamoactresp');
		$tMap->setPhpName('Ccamoactresp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccamoactresp_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CAPINI', 'Capini', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('MONINT', 'Monint', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ESTATU', 'Estatu', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('MONPRI', 'Monpri', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('MONSALCAP', 'Monsalcap', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('NUMCUO', 'Numcuo', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MONCUO', 'Moncuo', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('MONINTMOR', 'Monintmor', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('CCDEFAMO_ID', 'CcdefamoId', 'int', CreoleTypes::INTEGER, 'ccdefamo', 'ID', true, null);

		$tMap->addForeignKey('CCCREDIT_ID', 'CccreditId', 'int', CreoleTypes::INTEGER, 'cccredit', 'ID', true, null);

		$tMap->addForeignKey('CCPARTID_ID', 'CcpartidId', 'int', CreoleTypes::INTEGER, 'ccpartid', 'ID', true, null);

		$tMap->addForeignKey('CCPROGRA_ID', 'CcprograId', 'int', CreoleTypes::INTEGER, 'ccprogra', 'ID', true, null);

	} 
} 