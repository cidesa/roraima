<?php



class ForunimedmetMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForunimedmetMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forunimedmet');
		$tMap->setPhpName('Forunimedmet');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('forunimedmet_SEQ');

		$tMap->addColumn('CODUNIMET', 'Codunimet', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMEXTUNI', 'Nomextuni', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NOMABRUNI', 'Nomabruni', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 