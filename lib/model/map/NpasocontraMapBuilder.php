<?php



class NpasocontraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpasocontraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npasocontra');
		$tMap->setPhpName('Npasocontra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npasocontra_SEQ');

		$tMap->addColumn('CODCONANT', 'Codconant', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODCONACT', 'Codconact', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 