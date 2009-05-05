<?php



class AtpresupuestoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AtpresupuestoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atpresupuesto');
		$tMap->setPhpName('Atpresupuesto');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atpresupuesto_SEQ');

		$tMap->addForeignKey('ATAYUDAS_ID', 'AtayudasId', 'int', CreoleTypes::INTEGER, 'atayudas', 'ID', false, null);

		$tMap->addForeignKey('ATPROVEE1', 'Atprovee1', 'int', CreoleTypes::INTEGER, 'atprovee', 'ID', true, null);

		$tMap->addColumn('MONTO1', 'Monto1', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('ATPROVEE2', 'Atprovee2', 'int', CreoleTypes::INTEGER, 'atprovee', 'ID', true, null);

		$tMap->addColumn('MONTO2', 'Monto2', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('ATPROVEE3', 'Atprovee3', 'int', CreoleTypes::INTEGER, 'atprovee', 'ID', true, null);

		$tMap->addColumn('MONTO3', 'Monto3', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('ATPROVEE4', 'Atprovee4', 'int', CreoleTypes::INTEGER, 'atprovee', 'ID', true, null);

		$tMap->addColumn('MONTO4', 'Monto4', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('ATPROVEE5', 'Atprovee5', 'int', CreoleTypes::INTEGER, 'atprovee', 'ID', true, null);

		$tMap->addColumn('MONTO5', 'Monto5', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('ATPROVEE6', 'Atprovee6', 'int', CreoleTypes::INTEGER, 'atprovee', 'ID', true, null);

		$tMap->addColumn('MONTO6', 'Monto6', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 