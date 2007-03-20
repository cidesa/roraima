<?php


	
class PlannuevoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PlannuevoMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('plannuevo');
		$tMap->setPhpName('Plannuevo');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODOLD', 'Codold', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('NOMOLD', 'Nomold', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('CODNEW', 'Codnew', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('NOMNEW', 'Nomnew', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 