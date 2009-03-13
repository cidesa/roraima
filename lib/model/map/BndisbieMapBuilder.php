<?php



class BndisbieMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BndisbieMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bndisbie');
		$tMap->setPhpName('Bndisbie');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bndisbie_SEQ');

		$tMap->addColumn('CODDIS', 'Coddis', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DESDIS', 'Desdis', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('AFECON', 'Afecon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STADIS', 'Stadis', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DESINC', 'Desinc', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ADIMEJ', 'Adimej', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('VIDUTI', 'Viduti', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 