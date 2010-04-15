<?php



class FordefdirecMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefdirecMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordefdirec');
		$tMap->setPhpName('Fordefdirec');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fordefdirec_SEQ');

		$tMap->addColumn('CODDIR', 'Coddir', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DESDIR', 'Desdir', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 