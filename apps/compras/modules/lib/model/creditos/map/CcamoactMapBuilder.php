<?php



class CcamoactMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcamoactMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccamoact');
		$tMap->setPhpName('Ccamoact');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccamoact_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CAPINI', 'Capini', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('MONINT', 'Monint', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ESTATU', 'Estatu', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('MONPRI', 'Monpri', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('MONSALCAP', 'Monsalcap', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('NUMCUO', 'Numcuo', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MONCUO', 'Moncuo', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('MONINTMOR', 'Monintmor', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('MONINTGRA', 'Monintgra', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('MONINTCUM', 'Monintcum', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('MONTOTCUO', 'Montotcuo', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('TIPCUO', 'Tipcuo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addForeignKey('CCDEFAMO_ID', 'CcdefamoId', 'int', CreoleTypes::INTEGER, 'ccdefamo', 'ID', true, null);

		$tMap->addForeignKey('CCCREDIT_ID', 'CccreditId', 'int', CreoleTypes::INTEGER, 'cccredit', 'ID', true, null);

		$tMap->addForeignKey('CCPARTID_ID', 'CcpartidId', 'int', CreoleTypes::INTEGER, 'ccpartid', 'ID', true, null);

		$tMap->addForeignKey('CCPROGRA_ID', 'CcprograId', 'int', CreoleTypes::INTEGER, 'ccprogra', 'ID', true, null);

	} 
} 