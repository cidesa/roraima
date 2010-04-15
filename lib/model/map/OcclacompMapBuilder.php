<?php



class OcclacompMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcclacompMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('occlacomp');
		$tMap->setPhpName('Occlacomp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('occlacomp_SEQ');

		$tMap->addColumn('CODCLACOMP', 'Codclacomp', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('DESCLACOMP', 'Desclacomp', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 