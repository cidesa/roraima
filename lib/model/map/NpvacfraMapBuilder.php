<?php


	
class NpvacfraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpvacfraMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npvacfra');
		$tMap->setPhpName('Npvacfra');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CAUDES', 'Caudes', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('CAUHAS', 'Cauhas', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('DIAVAC', 'Diavac', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DIABON', 'Diabon', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONVAC', 'Monvac', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONBON', 'Monbon', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 