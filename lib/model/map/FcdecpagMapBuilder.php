<?php


	
class FcdecpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdecpagMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcdecpag');
		$tMap->setPhpName('Fcdecpag');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMPAG', 'Numpag', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NUMDEC', 'Numdec', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('NUMREF', 'Numref', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('MONDEC', 'Mondec', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NUMERO', 'Numero', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('FUEING', 'Fueing', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 