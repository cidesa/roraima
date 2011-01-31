<?php



class CccondicMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CccondicMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cccondic');
		$tMap->setPhpName('Cccondic');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cccondic_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMCONDIC', 'Nomcondic', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('DESCONDIC', 'Descondic', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('GENTXT', 'Gentxt', 'string', CreoleTypes::VARCHAR, false, 1);

	} 
} 