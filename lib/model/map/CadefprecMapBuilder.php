<?php



class CadefprecMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CadefprecMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cadefprec');
		$tMap->setPhpName('Cadefprec');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPREC', 'Codprec', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('NOMPREC', 'Nomprec', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 