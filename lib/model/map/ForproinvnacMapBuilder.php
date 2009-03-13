<?php



class ForproinvnacMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForproinvnacMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forproinvnac');
		$tMap->setPhpName('Forproinvnac');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODORG', 'Codorg', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODPREORG', 'Codpreorg', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODPREGOB', 'Codpregob', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('DESPREORG', 'Despreorg', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('MONAPOORG', 'Monapoorg', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 