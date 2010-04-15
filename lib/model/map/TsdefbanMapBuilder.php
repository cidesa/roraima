<?php



class TsdefbanMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsdefbanMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tsdefban');
		$tMap->setPhpName('Tsdefban');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tsdefban_SEQ');

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NOMCUE', 'Nomcue', 'string', CreoleTypes::VARCHAR, true, 40);

		$tMap->addColumn('TIPCUE', 'Tipcue', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECPER', 'Fecper', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('RENAUT', 'Renaut', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PORINT', 'Porint', 'double', CreoleTypes::NUMERIC, false, 5);

		$tMap->addColumn('TIPINT', 'Tipint', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMCHE', 'Numche', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('ANTBAN', 'Antban', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DEBBAN', 'Debban', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CREBAN', 'Creban', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ANTLIB', 'Antlib', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DEBLIB', 'Deblib', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CRELIB', 'Crelib', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VALCHE', 'Valche', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('CONCIL', 'Concil', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PLAZO', 'Plazo', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('FECAPE', 'Fecape', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('USOCUE', 'Usocue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIPREN', 'Tipren', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('DESENL', 'Desenl', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('PORSALMIN', 'Porsalmin', 'double', CreoleTypes::NUMERIC, false, 5);

		$tMap->addColumn('MONSALMIN', 'Monsalmin', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODCTAPRECOO', 'Codctaprecoo', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTAPREORD', 'Codctapreord', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('TRASITORIA', 'Trasitoria', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('SALACT', 'Salact', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addColumn('FECAPER', 'Fecaper', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TEMNUMCUE', 'Temnumcue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CANTDIG', 'Cantdig', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('ENDOSABLE', 'Endosable', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 