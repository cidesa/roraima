<?php


	
class FatiprecMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FatiprecMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fatiprec');
		$tMap->setPhpName('Fatiprec');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODTIPREC', 'Codtiprec', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIPREC', 'Destiprec', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 