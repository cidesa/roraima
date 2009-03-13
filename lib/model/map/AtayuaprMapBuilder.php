<?php



class AtayuaprMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AtayuaprMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atayuapr');
		$tMap->setPhpName('Atayuapr');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atayuapr_SEQ');

		$tMap->addForeignKey('ATDETAYU_ID', 'AtdetayuId', 'int', CreoleTypes::INTEGER, 'atdetayu', 'ID', false, null);

		$tMap->addColumn('CANTIDAD', 'Cantidad', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 