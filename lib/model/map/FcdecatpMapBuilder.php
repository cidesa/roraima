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

		$tMap->addColumn('NUMDEC', 'Numdec', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NUMLIC', 'Numlic', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('FECDEC', 'Fecdec', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('MONDEC', 'Mondec', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('FUNDEC', 'Fundec', 'string', CreoleTypes::VARCHAR, true, 40);

		$tMap->addColumn('EDODEC', 'Edodec', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 