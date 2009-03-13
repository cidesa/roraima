<?php



class FarecproMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FarecproMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('farecpro');
		$tMap->setPhpName('Farecpro');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('farecpro_SEQ');

		$tMap->addForeignKey('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, 'facliente', 'CODPRO', true, 15);

		$tMap->addForeignKey('CODREC', 'Codrec', 'string', CreoleTypes::VARCHAR, 'carecaud', 'CODREC', true, 10);

		$tMap->addColumn('FECENT', 'Fecent', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 