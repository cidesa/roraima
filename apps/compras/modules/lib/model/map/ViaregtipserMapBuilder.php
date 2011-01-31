<?php



class ViaregtipserMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViaregtipserMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viaregtipser');
		$tMap->setPhpName('Viaregtipser');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viaregtipser_SEQ');

		$tMap->addColumn('DESTIPSER', 'Destipser', 'string', CreoleTypes::VARCHAR, true, 254);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 