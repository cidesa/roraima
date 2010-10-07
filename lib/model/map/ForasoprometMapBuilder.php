<?php



class ForasoprometMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForasoprometMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forasopromet');
		$tMap->setPhpName('Forasopromet');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('forasopromet_SEQ');

		$tMap->addColumn('CODMET', 'Codmet', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('UBIGEO', 'Ubigeo', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('INDGES', 'Indges', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CALIND', 'Calind', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FRELEC', 'Frelec', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CANPRO', 'Canpro', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
