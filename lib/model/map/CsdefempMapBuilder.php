<?php



class CsdefempMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CsdefempMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('csdefemp');
		$tMap->setPhpName('Csdefemp');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIREMP', 'Diremp', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('TELEMP', 'Telemp', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FAXEMP', 'Faxemp', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('PORGASADM', 'Porgasadm', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORMARUTIL', 'Pormarutil', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORPERMAT', 'Porpermat', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODTIPDIG', 'Codtipdig', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODTIPVIA', 'Codtipvia', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODTIPFAB', 'Codtipfab', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('VALUT', 'Valut', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 