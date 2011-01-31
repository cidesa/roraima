<?php



class RhdatevaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RhdatevaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rhdateva');
		$tMap->setPhpName('Rhdateva');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('rhdateva_SEQ');

		$tMap->addColumn('CODEVDO', 'Codevdo', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODEVOR', 'Codevor', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODSUP', 'Codsup', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('FECDES', 'Fecdes', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECHAS', 'Fechas', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECELA', 'Fecela', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 