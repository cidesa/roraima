<?php



class FaartpedMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FaartpedMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faartped');
		$tMap->setPhpName('Faartped');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faartped_SEQ');

		$tMap->addColumn('NROPED', 'Nroped', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CANORD', 'Canord', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANAJU', 'Canaju', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANDES', 'Candes', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANTOT', 'Cantot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PREART', 'Preart', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TOTART', 'Totart', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 