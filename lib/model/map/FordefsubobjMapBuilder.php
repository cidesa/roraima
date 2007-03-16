<?php


	
class FordefsubobjMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefsubobjMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fordefsubobj');
		$tMap->setPhpName('Fordefsubobj');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEQU', 'Codequ', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CODSUBOBJ', 'Codsubobj', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESSUBOBJ', 'Dessubobj', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 