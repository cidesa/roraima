<?php



class CcopcgenMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcopcgenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccopcgen');
		$tMap->setPhpName('Ccopcgen');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccopcgen_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('TIPCOM', 'Tipcom', 'string', CreoleTypes::VARCHAR, 'cpdoccom', 'TIPCOM', true, 100);

	} 
} 