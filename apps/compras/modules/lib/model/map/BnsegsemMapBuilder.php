<?php



class BnsegsemMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnsegsemMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnsegsem');
		$tMap->setPhpName('Bnsegsem');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnsegsem_SEQ');

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODSEM', 'Codsem', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NROSEGSEM', 'Nrosegsem', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('FECSEGSEM', 'Fecsegsem', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NOMSEGSEM', 'Nomsegsem', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('COBSEGSEM', 'Cobsegsem', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('MONSEGSEM', 'Monsegsem', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECSEGVEN', 'Fecsegven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('PROSEGSEM', 'Prosegsem', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('OBSSEGSEM', 'Obssegsem', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('STASEGSEM', 'Stasegsem', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 