<?php



class LinorcovMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LinorcovMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('linorcov');
		$tMap->setPhpName('Linorcov');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('linorcov_SEQ');

		$tMap->addColumn('ARCHINORCOV', 'Archinorcov', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 