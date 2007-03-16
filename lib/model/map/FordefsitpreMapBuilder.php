<?php


	
class FordefsitpreMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefsitpreMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fordefsitpre');
		$tMap->setPhpName('Fordefsitpre');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODSITPRE', 'Codsitpre', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESSITPRE', 'Dessitpre', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 