<?php



class Dftemporal4MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Dftemporal4MapBuilder';

	
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

		$tMap = $this->dbMap->addTable('dftemporal4');
		$tMap->setPhpName('Dftemporal4');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('ABR', 'Abr', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('EXT', 'Ext', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 