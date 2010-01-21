<?php



class CcpagoMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcpagoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccpago');
		$tMap->setPhpName('Ccpago');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccpago_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MONTOT', 'Montot', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('NUMTRA', 'Numtra', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('FECPAG', 'Fecpag', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CEDRIFCUE', 'Cedrifcue', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCPERPARAMO_ID', 'CcperparamoId', 'int', CreoleTypes::INTEGER, 'ccperparamo', 'ID', true, null);

		$tMap->addForeignKey('CCCUEBAN_ID', 'CccuebanId', 'int', CreoleTypes::INTEGER, 'cccueban', 'ID', true, null);

		$tMap->addForeignKey('CCPERPRE_ID', 'CcperpreId', 'int', CreoleTypes::INTEGER, 'ccperpre', 'ID', false, null);

		$tMap->addForeignKey('CCTIPTRA_ID', 'CctiptraId', 'int', CreoleTypes::INTEGER, 'cctiptra', 'ID', true, null);

		$tMap->addForeignKey('CCCREDIT_ID', 'CccreditId', 'int', CreoleTypes::INTEGER, 'cccredit', 'ID', true, null);

		$tMap->addColumn('RESAMOCAP', 'Resamocap', 'string', CreoleTypes::VARCHAR, false, 1);

	} 
} 