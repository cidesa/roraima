<?php


	
class ForasopryaccespsubaccMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForasopryaccespsubaccMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('forasopryaccespsubacc');
		$tMap->setPhpName('Forasopryaccespsubacc');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODACCESP', 'Codaccesp', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODSUBACC', 'Codsubacc', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 