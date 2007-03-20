<?php


	
class NptipactMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NptipactMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('nptipact');
		$tMap->setPhpName('Nptipact');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODTIPACT', 'Codtipact', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESTIPACT', 'Destipact', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 