<?php


	
class FcdefubimagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdefubimagMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcdefubimag');
		$tMap->setPhpName('Fcdefubimag');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('CODUBIMAG', 'Codubimag', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('NOMUBIMAG', 'Nomubimag', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 