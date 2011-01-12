<?php



class CcavagarsolMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcavagarsolMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccavagarsol');
		$tMap->setPhpName('Ccavagarsol');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccavagarsol_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('CCAVALIS_ID', 'CcavalisId', 'int', CreoleTypes::INTEGER, 'ccavalis', 'ID', true, null);

		$tMap->addForeignKey('CCGARSOL_ID', 'CcgarsolId', 'int', CreoleTypes::INTEGER, 'ccgarsol', 'ID', true, null);

	} 
} 