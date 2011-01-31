<?php



class GiregindMapBuilder {

	
	const CLASS_NAME = 'lib.model.gestionindicadores.map.GiregindMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('giregind');
		$tMap->setPhpName('Giregind');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('giregind_SEQ');

		$tMap->addColumn('NUMUNI', 'Numuni', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NUMINDG', 'Numindg', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMINDG', 'Nomindg', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('ESTINDG', 'Estindg', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 