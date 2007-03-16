<?php


	
class FordefejedesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefejedesMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fordefejedes');
		$tMap->setPhpName('Fordefejedes');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEJEDES', 'Codejedes', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESEJEDES', 'Desejedes', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 