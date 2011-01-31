<?php



class SegranaprMapBuilder {

	
	const CLASS_NAME = 'lib.model.sima_user.map.SegranaprMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap('sima_user');

		$tMap = $this->dbMap->addTable('segranapr');
		$tMap->setPhpName('Segranapr');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('segranapr_SEQ');

		$tMap->addColumn('RANDES', 'Randes', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('RANHAS', 'Ranhas', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 