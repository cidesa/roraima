<?php



class IncondpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.IncondpagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('incondpag');
		$tMap->setPhpName('Incondpag');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('incondpag_SEQ');

		$tMap->addColumn('CODCOND', 'Codcond', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESCOND', 'Descond', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('TIPCOND', 'Tipcond', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('GENORD', 'Genord', 'string', CreoleTypes::VARCHAR, true, 200);

		$tMap->addColumn('DIASCOND', 'Diascond', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 