<?php



class OcdefempMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcdefempMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ocdefemp');
		$tMap->setPhpName('Ocdefemp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ocdefemp_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('DIREMP', 'Diremp', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('TELEMP', 'Telemp', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('FAXEMP', 'Faxemp', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('EMAEMP', 'Emaemp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PORANT', 'Porant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PLAINI', 'Plaini', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORAUMOBR', 'Poraumobr', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORMUL', 'Pormul', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('UNITRI', 'Unitri', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODACTPROINI', 'Codactproini', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODACTINI', 'Codactini', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODACTPAR', 'Codactpar', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODACTREI', 'Codactrei', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODACTPROTER', 'Codactproter', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODACTTER', 'Codactter', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODACTRECPRO', 'Codactrecpro', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODACTRECDEF', 'Codactrecdef', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODINGRES', 'Codingres', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODCONOBR', 'Codconobr', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODCONINS', 'Codconins', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODCONSUP', 'Codconsup', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODCONPRO', 'Codconpro', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODVALANT', 'Codvalant', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODVALPAR', 'Codvalpar', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODVALFIN', 'Codvalfin', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODVALRET', 'Codvalret', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODVALREC', 'Codvalrec', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODPARREC', 'Codparrec', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('IVAANT', 'Ivaant', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('RETANT', 'Retant', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('GENCOM', 'Gencom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIPCOM', 'Tipcom', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 