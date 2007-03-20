<?php


	
class PagforpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PagforpagMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('pagforpag');
		$tMap->setPhpName('Pagforpag');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODFOR', 'Codfor', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESFOR', 'Desfor', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 