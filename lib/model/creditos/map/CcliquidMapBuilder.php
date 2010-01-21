<?php



class CcliquidMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcliquidMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccliquid');
		$tMap->setPhpName('Ccliquid');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccliquid_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ORDLIQ', 'Ordliq', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('MONLIQ', 'Monliq', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('NUMCHE', 'Numche', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODUSUAUT', 'Codusuaut', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ESTCHE', 'Estche', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('MONACULIQ', 'Monaculiq', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addForeignKey('CCCREDIT_ID', 'CccreditId', 'int', CreoleTypes::INTEGER, 'cccredit', 'ID', true, null);

		$tMap->addForeignKey('CCCUADES_ID', 'CccuadesId', 'int', CreoleTypes::INTEGER, 'cccuades', 'ID', true, null);

		$tMap->addForeignKey('CCPARTID_ID', 'CcpartidId', 'int', CreoleTypes::INTEGER, 'ccpartid', 'ID', true, null);

		$tMap->addForeignKey('CCSOLLIQ_ID', 'CcsolliqId', 'int', CreoleTypes::INTEGER, 'ccsolliq', 'ID', true, null);

		$tMap->addForeignKey('CCCONCEP_ID', 'CcconcepId', 'int', CreoleTypes::INTEGER, 'ccconcep', 'ID', true, null);

		$tMap->addForeignKey('CCPAGTER_ID', 'CcpagterId', 'int', CreoleTypes::INTEGER, 'ccpagter', 'ID', true, null);

		$tMap->addForeignKey('CCCUEBAN_ID', 'CccuebanId', 'int', CreoleTypes::INTEGER, 'cccueban', 'ID', true, null);

		$tMap->addForeignKey('CCPROGRA_ID', 'CcprograId', 'int', CreoleTypes::INTEGER, 'ccprogra', 'ID', true, null);

	} 
} 