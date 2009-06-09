<?php



class NpracMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpracMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nprac');
		$tMap->setPhpName('Nprac');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nprac_SEQ');

		$tMap->addColumn('CODIGO', 'Codigo', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('FORCOD', 'Forcod', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('ANODES', 'Anodes', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('ANOHAS', 'Anohas', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 