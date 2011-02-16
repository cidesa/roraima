<?php



class LirecomenMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LirecomenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lirecomen');
		$tMap->setPhpName('Lirecomen');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lirecomen_SEQ');

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODLIC', 'Codlic', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('RIF', 'Rif', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 