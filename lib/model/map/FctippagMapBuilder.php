<?php


	
class FctippagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FctippagMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fctippag');
		$tMap->setPhpName('Fctippag');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('TIPPAG', 'Tippag', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESPAG', 'Despag', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 