<?php


	
class NpvaccolMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpvaccolMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npvaccol');
		$tMap->setPhpName('Npvaccol');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DISDES', 'Disdes', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('DISHAS', 'Dishas', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('DIAVAC', 'Diavac', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DIANHAB', 'Dianhab', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STAREG', 'Stareg', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 