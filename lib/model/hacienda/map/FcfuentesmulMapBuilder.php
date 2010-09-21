<?php



class FcfuentesmulMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcfuentesmulMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcfuentesmul');
		$tMap->setPhpName('Fcfuentesmul');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcfuentesmul_SEQ');

		$tMap->addColumn('CODMUL', 'Codmul', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODFUE', 'Codfue', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODFUEGEN', 'Codfuegen', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 