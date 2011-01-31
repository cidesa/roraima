<?php



class ViaasopronivMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViaasopronivMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viaasoproniv');
		$tMap->setPhpName('Viaasoproniv');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viaasoproniv_SEQ');

		$tMap->addColumn('CODPROCED', 'Codproced', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODNIVAPR', 'Codnivapr', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('PRIORIAPR', 'Prioriapr', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 