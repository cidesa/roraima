<?php



class NppagintMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NppagintMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nppagint');
		$tMap->setPhpName('Nppagint');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nppagint_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECPAG', 'Fecpag', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('SALINT', 'Salint', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 