<?php


	
class FcdefubifisMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdefubifisMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcdefubifis');
		$tMap->setPhpName('Fcdefubifis');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('CODUBIFIS', 'Codubifis', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('NOMUBIFIS', 'Nomubifis', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 