<?php


	
class CaconpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaconpagMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('caconpag');
		$tMap->setPhpName('Caconpag');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCONPAG', 'Codconpag', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESCONPAG', 'Desconpag', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('TIPCONPAG', 'Tipconpag', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMDIA', 'Numdia', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('GENERAOP', 'Generaop', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ASIPARREC', 'Asiparrec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('GENERACOM', 'Generacom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MERCON', 'Mercon', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CTADEV', 'Ctadev', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTAVCO', 'Ctavco', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('UNIVTA', 'Univta', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 