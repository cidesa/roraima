<?php



class ForasoproobjMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForasoproobjMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forasoproobj');
		$tMap->setPhpName('Forasoproobj');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('forasoproobj_SEQ');

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODOBJ', 'Codobj', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 