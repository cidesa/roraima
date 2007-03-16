<?php


	
class FacladtoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FacladtoMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('facladto');
		$tMap->setPhpName('Facladto');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESCTO', 'Descto', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('CLAVE', 'Clave', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 