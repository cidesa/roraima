<?php


	
class CpescsueMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CpescsueMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('cpescsue');
		$tMap->setPhpName('Cpescsue');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODESC', 'Codesc', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('VALINI', 'Valini', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('VALFIN', 'Valfin', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 