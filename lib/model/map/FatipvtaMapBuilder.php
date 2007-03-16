<?php


	
class FatipvtaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FatipvtaMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fatipvta');
		$tMap->setPhpName('Fatipvta');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODTIVTA', 'Codtivta', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMTIVTA', 'Nomtivta', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 