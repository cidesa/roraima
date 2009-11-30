<?php



class CiajusteMapBuilder {

	
	const CLASS_NAME = 'lib.model.ingresos.map.CiajusteMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ciajuste');
		$tMap->setPhpName('Ciajuste');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ciajuste_SEQ');

		$tMap->addColumn('REFAJU', 'Refaju', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECAJU', 'Fecaju', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('ANOAJU', 'Anoaju', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('REFERE', 'Refere', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('DESAJU', 'Desaju', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('TOTAJU', 'Totaju', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAAJU', 'Staaju', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 