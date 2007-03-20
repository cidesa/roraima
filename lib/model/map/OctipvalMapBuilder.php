<?php


	
class OctipvalMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OctipvalMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('octipval');
		$tMap->setPhpName('Octipval');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODTIPVAL', 'Codtipval', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESTIPVAL', 'Destipval', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('NOMABR', 'Nomabr', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 