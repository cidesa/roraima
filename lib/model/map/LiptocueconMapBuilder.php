<?php



class LiptocueconMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LiptocueconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liptocuecon');
		$tMap->setPhpName('Liptocuecon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liptocuecon_SEQ');

		$tMap->addColumn('NUMPTOCUECON', 'Numptocuecon', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMPLIE', 'Numplie', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMEXP', 'Numexp', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODEMPADM', 'Codempadm', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODUNIADM', 'Coduniadm', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODEMPEJE', 'Codempeje', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODUNISTE', 'Coduniste', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIAS', 'Dias', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DETRECOMEN', 'Detrecomen', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('NUMRECOFE', 'Numrecofe', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('RESOLU', 'Resolu', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECREL', 'Fecrel', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DECRET', 'Decret', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECDEC', 'Fecdec', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DETDECRET', 'Detdecret', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('DOCANE1', 'Docane1', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DOCANE2', 'Docane2', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DOCANE3', 'Docane3', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PREPOR', 'Prepor', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CARGOPRE', 'Cargopre', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addForeignKey('LISICACT_ID', 'LisicactId', 'int', CreoleTypes::INTEGER, 'lisicact', 'ID', false, null);

		$tMap->addColumn('DETDECMOD', 'Detdecmod', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('ANAPOR', 'Anapor', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CARGOANA', 'Cargoana', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 