<?php


	
class NpdefclaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpdefclaMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npdefcla');
		$tMap->setPhpName('Npdefcla');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCLA', 'Codcla', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESCLA', 'Descla', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 