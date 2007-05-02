<?php


	
class FcdetconMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdetconMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcdetcon');
		$tMap->setPhpName('Fcdetcon');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFCON', 'Refcon', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NUMDEC', 'Numdec', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('MONCUO', 'Moncuo', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NUMCUO', 'Numcuo', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('OBSCUO', 'Obscuo', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 