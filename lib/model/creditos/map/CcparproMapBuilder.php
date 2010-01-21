<?php



class CcparproMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcparproMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccparpro');
		$tMap->setPhpName('Ccparpro');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccparpro_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PLAZO', 'Plazo', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PERMUE', 'Permue', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PERGRA', 'Pergra', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MODALI', 'Modali', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('NUMCUO', 'Numcuo', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NUMCUOFIN', 'Numcuofin', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TASINT', 'Tasint', 'double', CreoleTypes::DOUBLE, true, null);

		$tMap->addColumn('TASINTMOR', 'Tasintmor', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECDESPP', 'Fecdespp', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECHASPP', 'Fechaspp', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODUNI', 'Coduni', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('INTGRAVA', 'Intgrava', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('INTCUMINC', 'Intcuminc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('CONTABB_ID', 'ContabbId', 'int', CreoleTypes::INTEGER, 'contabb', 'ID', true, null);

		$tMap->addForeignKey('CCPARTID_ID', 'CcpartidId', 'int', CreoleTypes::INTEGER, 'ccpartid', 'ID', true, null);

		$tMap->addForeignKey('CCPROGRA_ID', 'CcprograId', 'int', CreoleTypes::INTEGER, 'ccprogra', 'ID', true, null);

		$tMap->addForeignKey('CCTIPINT_ID', 'CctipintId', 'int', CreoleTypes::INTEGER, 'cctipint', 'ID', true, null);

		$tMap->addForeignKey('CCDEDUCC_ID', 'CcdeduccId', 'int', CreoleTypes::INTEGER, 'ccdeducc', 'ID', false, null);

		$tMap->addForeignKey('CCPERGRAVA_ID', 'CcpergravaId', 'int', CreoleTypes::INTEGER, 'ccperiod', 'ID', true, null);

	} 
} 