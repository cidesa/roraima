<?php



class ViaregtiptabMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViaregtiptabMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viaregtiptab');
		$tMap->setPhpName('Viaregtiptab');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viaregtiptab_SEQ');

		$tMap->addColumn('DESTIPTAB', 'Destiptab', 'string', CreoleTypes::VARCHAR, true, 254);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 