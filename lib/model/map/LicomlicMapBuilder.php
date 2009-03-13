<?php



class LicomlicMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LicomlicMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('licomlic');
		$tMap->setPhpName('Licomlic');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('licomlic_SEQ');

		$tMap->addColumn('CODCOM', 'Codcom', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESCOM', 'Descom', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('FECNOM', 'Fecnom', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DECRET', 'Decret', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 