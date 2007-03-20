<?php


	
class NpvacantMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpvacantMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npvacant');
		$tMap->setPhpName('Npvacant');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CAUDES', 'Caudes', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('CAUHAS', 'Cauhas', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('DIAVAC', 'Diavac', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('DIAANT', 'Diaant', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DIAPAG', 'Diapag', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DIADIS', 'Diadis', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONVAC', 'Monvac', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 