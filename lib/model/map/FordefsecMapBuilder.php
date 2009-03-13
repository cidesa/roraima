<?php



class FordefsecMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefsecMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordefsec');
		$tMap->setPhpName('Fordefsec');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fordefsec_SEQ');

		$tMap->addColumn('CODSEC', 'Codsec', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMSEC', 'Nomsec', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 