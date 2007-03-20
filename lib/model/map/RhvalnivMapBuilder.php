<?php


	
class RhvalnivMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RhvalnivMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('rhvalniv');
		$tMap->setPhpName('Rhvalniv');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODVALINS', 'Codvalins', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('PORVALINS', 'Porvalins', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 