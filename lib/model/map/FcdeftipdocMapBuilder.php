<?php


	
class FcdeftipdocMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdeftipdocMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcdeftipdoc');
		$tMap->setPhpName('Fcdeftipdoc');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODTIPDOC', 'Codtipdoc', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMTIPDOC', 'Nomtipdoc', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('TEMTIPDOC', 'Temtipdoc', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 