<?php



class CiregingMapBuilder {

	
	const CLASS_NAME = 'lib.model.ingresos.map.CiregingMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cireging');
		$tMap->setPhpName('Cireging');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cireging_SEQ');

		$tMap->addColumn('REFING', 'Refing', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECING', 'Fecing', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('DESING', 'Desing', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('MONING', 'Moning', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('MONREC', 'Monrec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONDES', 'Mondes', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONTOT', 'Montot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('STAING', 'Staing', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CTABAN', 'Ctaban', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIPMOV', 'Tipmov', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('PREVIS', 'Previs', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ANOING', 'Anoing', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NUMDEP', 'Numdep', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NUMOFI', 'Numofi', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('REFLIB', 'Reflib', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('STALIQ', 'Staliq', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECLIQ', 'Fecliq', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('REFLIQ', 'Refliq', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('DESLIQ', 'Desliq', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FECDEP', 'Fecdep', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 