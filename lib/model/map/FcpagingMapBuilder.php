<?php



class FcpagingMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcpagingMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcpaging');
		$tMap->setPhpName('Fcpaging');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcpaging_SEQ');

		$tMap->addColumn('REFERE', 'Refere', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('TIPPAG', 'Tippag', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('MONING', 'Moning', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NUMREF', 'Numref', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('NOMREF', 'Nomref', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 