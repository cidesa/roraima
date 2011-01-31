<?php



class CcdefamoMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcdefamoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccdefamo');
		$tMap->setPhpName('Ccdefamo');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccdefamo_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MONTOT', 'Montot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CUOTAS', 'Cuotas', 'string', CreoleTypes::VARCHAR, false, 150);

		$tMap->addColumn('NUMCUO', 'Numcuo', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NUMCUOFIN', 'Numcuofin', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NUMCUOANU', 'Numcuoanu', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('PERGRA', 'Pergra', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PERMUE', 'Permue', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PLAFIN', 'Plafin', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PLAZO', 'Plazo', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('FECDESDEF', 'Fecdesdef', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECHASDEF', 'Fechasdef', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIFINT', 'Difint', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('TASINTMOR', 'Tasintmor', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TASINT', 'Tasint', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DISANU', 'Disanu', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('PORDISANU', 'Pordisanu', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('RESEQU', 'Resequ', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CUOESP', 'Cuoesp', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CUOESPIGU', 'Cuoespigu', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('INTGRAVA', 'Intgrava', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('INTCUMINC', 'Intcuminc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('APORGRAVA', 'Aporgrava', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('CCPERIOD_ID', 'CcperiodId', 'int', CreoleTypes::INTEGER, 'ccperiod', 'ID', true, null);

		$tMap->addForeignKey('CCTIPINT_ID', 'CctipintId', 'int', CreoleTypes::INTEGER, 'cctipint', 'ID', false, null);

		$tMap->addForeignKey('CCCREDIT_ID', 'CccreditId', 'int', CreoleTypes::INTEGER, 'cccredit', 'ID', true, null);

		$tMap->addForeignKey('CCPARTID_ID', 'CcpartidId', 'int', CreoleTypes::INTEGER, 'ccpartid', 'ID', true, null);

		$tMap->addForeignKey('CCPROGRA_ID', 'CcprograId', 'int', CreoleTypes::INTEGER, 'ccprogra', 'ID', true, null);

		$tMap->addForeignKey('CCPERGRAVA_ID', 'CcpergravaId', 'int', CreoleTypes::INTEGER, 'ccperiod', 'ID', true, null);

		$tMap->addColumn('CANTCUOESP', 'Cantcuoesp', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CUOESPINIC', 'Cuoespinic', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('FRECUOESP', 'Frecuoesp', 'int', CreoleTypes::INTEGER, 'ccperiod', 'ID', false, null);

		$tMap->addColumn('MONCUOESP', 'Moncuoesp', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONCUOPLA', 'Moncuopla', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, null);

	} 
} 