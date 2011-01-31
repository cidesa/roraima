<?php



class TsrelasiordMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsrelasiordMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tsrelasiord');
		$tMap->setPhpName('Tsrelasiord');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tsrelasiord_SEQ');

		$tMap->addColumn('CTAGASXPAG', 'Ctagasxpag', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTAORDXPAG', 'Ctaordxpag', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 