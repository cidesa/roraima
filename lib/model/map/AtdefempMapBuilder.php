<?php



class AtdefempMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AtdefempMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atdefemp');
		$tMap->setPhpName('Atdefemp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atdefemp_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('DIREMP', 'Diremp', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('TELEMP', 'Telemp', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('FAXEMP', 'Faxemp', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('EMAEMP', 'Emaemp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PERCON', 'Percon', 'string', CreoleTypes::VARCHAR, false, 150);

		$tMap->addColumn('REPLEG', 'Repleg', 'string', CreoleTypes::VARCHAR, false, 150);

		$tMap->addColumn('PREASI', 'Preasi', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONLIMBEN', 'Monlimben', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 