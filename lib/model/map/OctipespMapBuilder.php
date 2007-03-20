<?php


	
class OctipespMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OctipespMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('octipesp');
		$tMap->setPhpName('Octipesp');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODTIPESP', 'Codtipesp', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIPESP', 'Destipesp', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 