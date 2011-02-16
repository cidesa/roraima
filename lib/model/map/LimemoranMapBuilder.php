<?php



class LimemoranMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LimemoranMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('limemoran');
		$tMap->setPhpName('Limemoran');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('limemoran_SEQ');

		$tMap->addColumn('NUMEXP', 'Numexp', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('NUMEMO', 'Numemo', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('NOMPRO', 'Nompro', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CODFIN', 'Codfin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODCOM', 'Codcom', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODUNISTE', 'Coduniste', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODCLACOMP', 'Codclacomp', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('TIPCOM', 'Tipcom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DETMEMO', 'Detmemo', 'string', CreoleTypes::VARCHAR, false, 5000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 