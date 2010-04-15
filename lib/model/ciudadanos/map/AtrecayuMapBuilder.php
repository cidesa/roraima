<?php



class AtrecayuMapBuilder {

	
	const CLASS_NAME = 'lib.model.ciudadanos.map.AtrecayuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atrecayu');
		$tMap->setPhpName('Atrecayu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atrecayu_SEQ');

		$tMap->addForeignKey('ATTIPAYU_ID', 'AttipayuId', 'int', CreoleTypes::INTEGER, 'attipayu', 'ID', false, null);

		$tMap->addForeignKey('ATRECAUD_ID', 'AtrecaudId', 'int', CreoleTypes::INTEGER, 'atrecaud', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 