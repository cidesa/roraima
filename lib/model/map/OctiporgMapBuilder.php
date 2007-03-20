<?php


	
class OctiporgMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OctiporgMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('octiporg');
		$tMap->setPhpName('Octiporg');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODTIPORG', 'Codtiporg', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIPORG', 'Destiporg', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 