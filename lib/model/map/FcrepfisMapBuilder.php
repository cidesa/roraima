<?php


	
class FcrepfisMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcrepfisMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcrepfis');
		$tMap->setPhpName('Fcrepfis');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMLIC', 'Numlic', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FUNREC', 'Funrec', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECREP', 'Fecrep', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('NUMREP', 'Numrep', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('MONREP', 'Monrep', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CONREP', 'Conrep', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MODO', 'Modo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MONADI', 'Monadi', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 