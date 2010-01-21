<?php



class CcubiadmMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcubiadmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccubiadm');
		$tMap->setPhpName('Ccubiadm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccubiadm_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMUBIADM', 'Nomubiadm', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('DESUBIADM', 'Desubiadm', 'string', CreoleTypes::VARCHAR, true, 255);

	} 
} 