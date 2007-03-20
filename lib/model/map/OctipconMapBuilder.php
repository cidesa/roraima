<?php


	
class OctipconMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OctipconMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('octipcon');
		$tMap->setPhpName('Octipcon');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODTIPCON', 'Codtipcon', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIPCON', 'Destipcon', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 