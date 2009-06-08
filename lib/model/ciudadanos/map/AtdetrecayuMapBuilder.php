<?php



class AtdetrecayuMapBuilder {

	
	const CLASS_NAME = 'lib.model.ciudadanos.map.AtdetrecayuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atdetrecayu');
		$tMap->setPhpName('Atdetrecayu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atdetrecayu_SEQ');

		$tMap->addForeignKey('ATAYUDAS_ID', 'AtayudasId', 'int', CreoleTypes::INTEGER, 'atayudas', 'ID', false, null);

		$tMap->addForeignKey('ATRECAUD_ID', 'AtrecaudId', 'int', CreoleTypes::INTEGER, 'atrecaud', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 