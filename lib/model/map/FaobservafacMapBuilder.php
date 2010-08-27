<?php



class FaobservafacMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FaobservafacMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faobservafac');
		$tMap->setPhpName('Faobservafac');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faobservafac_SEQ');

		$tMap->addColumn('OBSFAC', 'Obsfac', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 