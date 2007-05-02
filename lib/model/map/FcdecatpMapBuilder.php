<?php


	
class FcdecatpMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdecatpMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcdecatp');
		$tMap->setPhpName('Fcdecatp');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('NUMDEC', 'Numdec', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('NUMLIC', 'Numlic', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECDEC', 'Fecdec', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('MONDEC', 'Mondec', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FUNDEC', 'Fundec', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('EDODEC', 'Edodec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 