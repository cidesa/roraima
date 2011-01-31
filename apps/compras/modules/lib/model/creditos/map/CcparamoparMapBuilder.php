<?php



class CcparamoparMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcparamoparMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccparamopar');
		$tMap->setPhpName('Ccparamopar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccparamopar_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PRIORI', 'Priori', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PORCEN', 'Porcen', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addForeignKey('CCPARTID_ID', 'CcpartidId', 'int', CreoleTypes::INTEGER, 'ccpartid', 'ID', true, null);

		$tMap->addForeignKey('CCPERPARAMO_ID', 'CcperparamoId', 'int', CreoleTypes::INTEGER, 'ccperparamo', 'ID', true, null);

	} 
} 