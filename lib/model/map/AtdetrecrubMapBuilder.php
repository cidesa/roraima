<?php



class AtdetrecrubMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AtdetrecrubMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atdetrecrub');
		$tMap->setPhpName('Atdetrecrub');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atdetrecrub_SEQ');

		$tMap->addForeignKey('ATRUBROS_ID', 'AtrubrosId', 'int', CreoleTypes::INTEGER, 'atrubros', 'ID', false, null);

		$tMap->addForeignKey('ATRECAUD_ID', 'AtrecaudId', 'int', CreoleTypes::INTEGER, 'atrecaud', 'ID', false, null);

		$tMap->addColumn('REQUERIDO', 'Requerido', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 