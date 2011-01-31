<?php



class CsrecotrgasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CsrecotrgasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('csrecotrgas');
		$tMap->setPhpName('Csrecotrgas');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPROD', 'Codprod', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODFAS', 'Codfas', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODGAS', 'Codgas', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CANGAS', 'Cangas', 'double', CreoleTypes::NUMERIC, false, null);

		$tMap->addColumn('COSTOT', 'Costot', 'double', CreoleTypes::NUMERIC, false, null);

		$tMap->addColumn('NROORD', 'Nroord', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('COSGAS', 'Cosgas', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 