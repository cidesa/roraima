<?php



class LicomintMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LicomintMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('licomint');
		$tMap->setPhpName('Licomint');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('licomint_SEQ');

		$tMap->addColumn('NUMCOMINT', 'Numcomint', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODEMPADM', 'Codempadm', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODUNIADM', 'Coduniadm', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODEMPEJE', 'Codempeje', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODUNISTE', 'Coduniste', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('TIPCON', 'Tipcon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIAS', 'Dias', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODCLACOMP', 'Codclacomp', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('MONCOM', 'Moncom', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODTIPLIC', 'Codtiplic', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODMON', 'Codmon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('TIPCOM', 'Tipcom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 