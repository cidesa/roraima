<?php


	
class NpescsueMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpescsueMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npescsue');
		$tMap->setPhpName('Npescsue');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODESC', 'Codesc', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('VALINI', 'Valini', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('VALFIN', 'Valfin', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 