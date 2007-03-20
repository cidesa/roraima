<?php


	
class Tabla51MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Tabla51MapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tabla51');
		$tMap->setPhpName('Tabla51');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFADI', 'Refadi', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECADI', 'Fecadi', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('ANOADI', 'Anoadi', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESADI', 'Desadi', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('ADIDIS', 'Adidis', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TOTADI', 'Totadi', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STAADI', 'Staadi', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('PERADI', 'Peradi', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('TIPGAS', 'Tipgas', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 