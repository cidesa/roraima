<?php



class CcamopagMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcamopagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccamopag');
		$tMap->setPhpName('Ccamopag');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccamopag_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DEBMONINT', 'Debmonint', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('DEBMONCAP', 'Debmoncap', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('DEBMONINTMOR', 'Debmonintmor', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('DEBMONINTGRA', 'Debmonintgra', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('DEBMONINTCUM', 'Debmonintcum', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('PAGMONCAP', 'Pagmoncap', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('PAGMONINT', 'Pagmonint', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('PAGMONINTMOR', 'Pagmonintmor', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('PAGMONINTGRA', 'Pagmonintgra', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('PAGMONINTCUM', 'Pagmonintcum', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('SALMONCAP', 'Salmoncap', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('SALMONINT', 'Salmonint', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('SALMONINTMOR', 'Salmonintmor', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('SALMONINTGRA', 'Salmonintgra', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('SALMONINTCUM', 'Salmonintcum', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('FECPAG', 'Fecpag', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CEDRIFCUE', 'Cedrifcue', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('ESTATU', 'Estatu', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCAMOACT_ID', 'CcamoactId', 'int', CreoleTypes::INTEGER, 'ccamoact', 'ID', true, null);

		$tMap->addForeignKey('CCPAGO_ID', 'CcpagoId', 'int', CreoleTypes::INTEGER, 'ccpago', 'ID', true, null);

		$tMap->addForeignKey('CCCREDIT_ID', 'CccreditId', 'int', CreoleTypes::INTEGER, 'cccredit', 'ID', true, null);

		$tMap->addForeignKey('CCPERPRE_ID', 'CcperpreId', 'int', CreoleTypes::INTEGER, 'ccperpre', 'ID', false, null);

		$tMap->addForeignKey('CCPARTID_ID', 'CcpartidId', 'int', CreoleTypes::INTEGER, 'ccpartid', 'ID', true, null);

		$tMap->addForeignKey('CCPROGRA_ID', 'CcprograId', 'int', CreoleTypes::INTEGER, 'ccprogra', 'ID', true, null);

	} 
} 