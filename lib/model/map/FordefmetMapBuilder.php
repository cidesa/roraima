<?php



class FordefmetMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefmetMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordefmet');
		$tMap->setPhpName('Fordefmet');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODMET', 'Codmet', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('DESMET', 'Desmet', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('NOMABR', 'Nomabr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CANTIDAD', 'Cantidad', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('INDPRO', 'Indpro', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('INVFUN', 'Invfun', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 