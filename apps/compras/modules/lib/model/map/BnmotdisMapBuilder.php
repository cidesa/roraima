<?php



class BnmotdisMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnmotdisMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnmotdis');
		$tMap->setPhpName('Bnmotdis');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnmotdis_SEQ');

		$tMap->addColumn('CODMOT', 'Codmot', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESMOT', 'Desmot', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('AFECON', 'Afecon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STADIS', 'Stadis', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DESINC', 'Desinc', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ADIMEJ', 'Adimej', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 