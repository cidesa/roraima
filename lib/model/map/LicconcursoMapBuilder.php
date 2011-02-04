<?php



class LicconcursoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LicconcursoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('licconcurso');
		$tMap->setPhpName('Licconcurso');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('licconcurso_SEQ');

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESCON', 'Descon', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 