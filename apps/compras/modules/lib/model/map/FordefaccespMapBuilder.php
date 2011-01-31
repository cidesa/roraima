<?php



class FordefaccespMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefaccespMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordefaccesp');
		$tMap->setPhpName('Fordefaccesp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fordefaccesp_SEQ');

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODACCESP', 'Codaccesp', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESACCESP', 'Desaccesp', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('NOMABRACCESP', 'Nomabraccesp', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODEMPRES', 'Codempres', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECCUL', 'Feccul', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DESBIESER', 'Desbieser', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('ORGEJE', 'Orgeje', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODUNIMED', 'Codunimed', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODEST', 'Codest', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('ESPADIUBIGEO', 'Espadiubigeo', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 