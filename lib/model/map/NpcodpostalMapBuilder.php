<?php


	
class NpcodpostalMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpcodpostalMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npcodpostal');
		$tMap->setPhpName('Npcodpostal');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPOS', 'Codpos', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CIUPOS', 'Ciupos', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 