<?php


	
class FatipcteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FatipcteMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fatipcte');
		$tMap->setPhpName('Fatipcte');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODTIPCLI', 'Codtipcli', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMTIPCTE', 'Nomtipcte', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 