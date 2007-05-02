<?php


	
class FctasbanMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FctasbanMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fctasban');
		$tMap->setPhpName('Fctasban');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('TASANO', 'Tasano', 'string', CreoleTypes::VARCHAR, false, 2004);

		$tMap->addColumn('TASPOR', 'Taspor', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TASMES', 'Tasmes', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 