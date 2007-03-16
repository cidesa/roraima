<?php


	
class FcusoinmMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcusoinmMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcusoinm');
		$tMap->setPhpName('Fcusoinm');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODUSOINM', 'Codusoinm', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMUSOINM', 'Nomusoinm', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 