<?php


	
class OctipprlMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OctipprlMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('octipprl');
		$tMap->setPhpName('Octipprl');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODTIPPRO', 'Codtippro', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIPPRO', 'Destippro', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 