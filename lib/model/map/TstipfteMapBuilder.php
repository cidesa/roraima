<?php


	
class TstipfteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TstipfteMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tstipfte');
		$tMap->setPhpName('Tstipfte');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODTIPFTE', 'Codtipfte', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMTIPFTE', 'Nomtipfte', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 