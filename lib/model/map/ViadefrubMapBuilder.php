<?php



class ViadefrubMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViadefrubMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viadefrub');
		$tMap->setPhpName('Viadefrub');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viadefrub_SEQ');

		$tMap->addColumn('CODRUB', 'Codrub', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('DESRUB', 'Desrub', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIPRUB', 'Tiprub', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('TIPDIA', 'Tipdia', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 