<?php



class CcavagarcreMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcavagarcreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccavagarcre');
		$tMap->setPhpName('Ccavagarcre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccavagarcre_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('CCAVALIS_ID', 'CcavalisId', 'int', CreoleTypes::INTEGER, 'ccavalis', 'ID', true, null);

		$tMap->addForeignKey('CCGARANT_ID', 'CcgarantId', 'int', CreoleTypes::INTEGER, 'ccgarant', 'ID', true, null);

	} 
} 