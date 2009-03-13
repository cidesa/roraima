<?php



class LidatsteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LidatsteMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lidatste');
		$tMap->setPhpName('Lidatste');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lidatste_SEQ');

		$tMap->addColumn('CODUNISTE', 'Coduniste', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESUNISTE', 'Desuniste', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addForeignKey('LITIPSTE_ID', 'LitipsteId', 'int', CreoleTypes::INTEGER, 'litipste', 'ID', true, null);

		$tMap->addColumn('DIRSTE', 'Dirste', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELSTE', 'Telste', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FAXSTE', 'Faxste', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('EMASTE', 'Emaste', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODPAI', 'Codpai', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODSEC', 'Codsec', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 