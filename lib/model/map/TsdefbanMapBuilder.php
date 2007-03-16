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

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NOMCUE', 'Nomcue', 'string', CreoleTypes::VARCHAR, true, 40);

		$tMap->addColumn('TIPCUE', 'Tipcue', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECPER', 'Fecper', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('RENAUT', 'Renaut', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PORINT', 'Porint', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TIPINT', 'Tipint', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMCHE', 'Numche', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('ANTBAN', 'Antban', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DEBBAN', 'Debban', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CREBAN', 'Creban', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ANTLIB', 'Antlib', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DEBLIB', 'Deblib', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CRELIB', 'Crelib', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('VALCHE', 'Valche', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CONCIL', 'Concil', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PLAZO', 'Plazo', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FECAPE', 'Fecape', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('USOCUE', 'Usocue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIPREN', 'Tipren', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('DESENL', 'Desenl', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('PORSALMIN', 'Porsalmin', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONSALMIN', 'Monsalmin', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CODCTAPRECOO', 'Codctaprecoo', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTAPREORD', 'Codctapreord', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('TRASITORIA', 'Trasitoria', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('SALACT', 'Salact', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FECAPER', 'Fecaper', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('TEMNUMCUE', 'Temnumcue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CANTDIG', 'Cantdig', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 