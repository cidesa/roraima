<?php



class CsrecmatMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CsrecmatMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('csrecmat');
		$tMap->setPhpName('Csrecmat');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPROD', 'Codprod', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODFAS', 'Codfas', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIPMAT', 'Tipmat', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CANMAT', 'Canmat', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addColumn('COSTOT', 'Costot', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addColumn('NROORD', 'Nroord', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('COSUNI', 'Cosuni', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 