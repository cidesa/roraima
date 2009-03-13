<?php



class IndestipcliMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.IndestipcliMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('indestipcli');
		$tMap->setPhpName('Indestipcli');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('indestipcli_SEQ');

		$tMap->addForeignKey('INDEFDES_ID', 'IndefdesId', 'int', CreoleTypes::INTEGER, 'indefdes', 'ID', false, null);

		$tMap->addForeignKey('INTIPCLI_ID', 'IntipcliId', 'int', CreoleTypes::INTEGER, 'intipcli', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 