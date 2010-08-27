<?php



class FadefproMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FadefproMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadefpro');
		$tMap->setPhpName('Fadefpro');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadefpro_SEQ');

		$tMap->addColumn('CODPROD', 'Codprod', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESPROD', 'Desprod', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 