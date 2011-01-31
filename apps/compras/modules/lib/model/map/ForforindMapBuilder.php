<?php



class ForforindMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForforindMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forforind');
		$tMap->setPhpName('Forforind');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODIND', 'Codind', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CODVARUNO', 'Codvaruno', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODVARDOS', 'Codvardos', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODVARTRE', 'Codvartre', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('OPEFOR', 'Opefor', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 