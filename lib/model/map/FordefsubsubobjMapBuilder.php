<?php


	
class FordefsubsubobjMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefsubsubobjMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fordefsubsubobj');
		$tMap->setPhpName('Fordefsubsubobj');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEQU', 'Codequ', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CODSUBOBJ', 'Codsubobj', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODSUBSUBOBJ', 'Codsubsubobj', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESSUBSUBOBJ', 'Dessubsubobj', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 