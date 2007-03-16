<?php


	
class FadefcomMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FadefcomMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fadefcom');
		$tMap->setPhpName('Fadefcom');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCOM', 'Codcom', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('NOMCOM', 'Nomcom', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 