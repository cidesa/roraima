<?php



class CcclabieMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcclabieMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccclabie');
		$tMap->setPhpName('Ccclabie');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccclabie_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMCLABIE', 'Nomclabie', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DESCLABIE', 'Desclabie', 'string', CreoleTypes::VARCHAR, false, 50);

	} 
} 