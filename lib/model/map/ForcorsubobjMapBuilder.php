<?php


	
class ForcorsubobjMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForcorsubobjMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('forcorsubobj');
		$tMap->setPhpName('Forcorsubobj');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEQU', 'Codequ', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CORSUBOBJ', 'Corsubobj', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 