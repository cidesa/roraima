<?php


	
class Fcsollic1MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Fcsollic1MapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcsollic1');
		$tMap->setPhpName('Fcsollic1');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('NUMLIC', 'Numlic', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECSOL', 'Fecsol', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECLIC', 'Feclic', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('CATCON', 'Catcon', 'string', CreoleTypes::VARCHAR, false, 21);

		$tMap->addColumn('RIFREP', 'Rifrep', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('NOMNEG', 'Nomneg', 'string', CreoleTypes::VARCHAR, false, 120);

		$tMap->addColumn('TIPINM', 'Tipinm', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIPEST', 'Tipest', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DIRPRI', 'Dirpri', 'string', CreoleTypes::VARCHAR, false, 120);

		$tMap->addColumn('CODRUT', 'Codrut', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('CAPSOC', 'Capsoc', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('HORINI', 'Horini', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('HORCIE', 'Horcie', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECFIN', 'Fecfin', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('DISCLI', 'Discli', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DISBAR', 'Disbar', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DISDIS', 'Disdis', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DISINS', 'Disins', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DISFUN', 'Disfun', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DISEST', 'Disest', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FUNRES', 'Funres', 'string', CreoleTypes::VARCHAR, false, 60);

		$tMap->addColumn('FUNREL', 'Funrel', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('FECRES', 'Fecres', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECAPR', 'Fecapr', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('TOMO', 'Tomo', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FOLIO', 'Folio', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMERO', 'Numero', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('TASLIC', 'Taslic', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DEUANL', 'Deuanl', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DEUACL', 'Deuacl', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('IMPLIC', 'Implic', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DEUANP', 'Deuanp', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DEUACP', 'Deuacp', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STASOL', 'Stasol', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STALIC', 'Stalic', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STADEC', 'Stadec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STALIQ', 'Staliq', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRCON', 'Dircon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ESTSER', 'Estser', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TELNEG', 'Telneg', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CLACON', 'Clacon', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('CAPACT', 'Capact', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 