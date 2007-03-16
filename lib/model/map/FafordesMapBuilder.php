<?php


	
class FafordesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FafordesMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fafordes');
		$tMap->setPhpName('Fafordes');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('FORDES', 'Fordes', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMDES', 'Nomdes', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 