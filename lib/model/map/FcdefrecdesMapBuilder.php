<?php


	
class FcdefrecdesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdefrecdesMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcdefrecdes');
		$tMap->setPhpName('Fcdefrecdes');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODDES', 'Coddes', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODREC', 'Codrec', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 