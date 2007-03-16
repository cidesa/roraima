<?php


	
class BnregmueMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnregmueMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('bnregmue');
		$tMap->setPhpName('Bnregmue');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODMUE', 'Codmue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESMUE', 'Desmue', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('ORDCOM', 'Ordcom', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECCOM', 'Feccom', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECDEP', 'Fecdep', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECAJU', 'Fecaju', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECACT', 'Fecact', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECEXP', 'Fecexp', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('ORDRCP', 'Ordrcp', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FOTMUE', 'Fotmue', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MARMUE', 'Marmue', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('MODMUE', 'Modmue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('ANOMUE', 'Anomue', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('COLMUE', 'Colmue', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('PESMUE', 'Pesmue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CAPMUE', 'Capmue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIPMUE', 'Tipmue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('VIDUTI', 'Viduti', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('LNGMUE', 'Lngmue', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NROPIE', 'Nropie', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('SERMUE', 'Sermue', 'string', CreoleTypes::VARCHAR, false, 150);

		$tMap->addColumn('USOMUE', 'Usomue', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('ALTMUE', 'Altmue', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('LARMUE', 'Larmue', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('ANCMUE', 'Ancmue', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('CODDIS', 'Coddis', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('DETMUE', 'Detmue', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('EDOMUE', 'Edomue', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('MUNMUE', 'Munmue', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DEPMUE', 'Depmue', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRMUE', 'Dirmue', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('UBIMUE', 'Ubimue', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MESDEP', 'Mesdep', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('VALINI', 'Valini', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('VALRES', 'Valres', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('VALLIB', 'Vallib', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('VALREX', 'Valrex', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('COSREP', 'Cosrep', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DEPMEN', 'Depmen', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DEPACU', 'Depacu', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STAMUE', 'Stamue', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODALT', 'Codalt', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FECRCP', 'Fecrcp', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('VALADI', 'Valadi', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('AUMVIDUTI', 'Aumviduti', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DIMVIDUTI', 'Dimviduti', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STASEM', 'Stasem', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STAINM', 'Stainm', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 