<?php


	
class FcdesvehMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdesvehMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcdesveh');
		$tMap->setPhpName('Fcdesveh');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('NUMDES', 'Numdes', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('PLAVEH', 'Plaveh', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECDES', 'Fecdes', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('MOTDES', 'Motdes', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('FUNREC', 'Funrec', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 