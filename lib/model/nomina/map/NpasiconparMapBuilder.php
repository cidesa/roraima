<?php



class NpasiconparMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpasiconparMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npasiconpar');
		$tMap->setPhpName('Npasiconpar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npasiconpar_SEQ');

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODTIPCAR', 'Codtipcar', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('GRACAR', 'Gracar', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODTIPCAT', 'Codtipcat', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODTIE', 'Codtie', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODESTEMP', 'Codestemp', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 