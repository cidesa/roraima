<?php



class RhtitcurMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RhtitcurMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rhtitcur');
		$tMap->setPhpName('Rhtitcur');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('rhtitcur_SEQ');

		$tMap->addColumn('CODTIT', 'Codtit', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMTIT', 'Nomtit', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 