<?php



class CaartdphMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaartdphMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caartdph');
		$tMap->setPhpName('Caartdph');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caartdph_SEQ');

		$tMap->addColumn('DPHART', 'Dphart', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CANDPH', 'Candph', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANDEV', 'Candev', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANTOT', 'Cantot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PREART', 'Preart', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONTOT', 'Montot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NUMLOT', 'Numlot', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('CANENT', 'Canent', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODFAL', 'Codfal', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, true, null);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 