<?php



class ForpreobrMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForpreobrMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forpreobr');
		$tMap->setPhpName('Forpreobr');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('forpreobr_SEQ');

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODOBR', 'Codobr', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODPAREGR', 'Codparegr', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('MONPRE', 'Monpre', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODFIN', 'Codfin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FUNCIONARIO', 'Funcionario', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECFIN', 'Fecfin', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('SITUACION', 'Situacion', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('COMPROANOANT', 'Comproanoant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('COMPROVIG', 'Comprovig', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EJECANOANT', 'Ejecanoant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EJECANOVIG', 'Ejecanovig', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ESTANOPOST', 'Estanopost', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NOMPAREGR', 'Nomparegr', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 