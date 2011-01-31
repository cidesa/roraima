<?php



class CcparentMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcparentMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccparent');
		$tMap->setPhpName('Ccparent');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccparent_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMPARENT', 'Nomparent', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('DESPARENT', 'Desparent', 'string', CreoleTypes::VARCHAR, false, 255);

	} 
} 