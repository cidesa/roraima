<?php


	
class NpseghcmMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpseghcmMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npseghcm');
		$tMap->setPhpName('Npseghcm');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('TIPPAR', 'Tippar', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('EDADDES', 'Edaddes', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('EDADHAS', 'Edadhas', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 