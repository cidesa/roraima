<?php


	
class NpcalvacMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpcalvacMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npcalvac');
		$tMap->setPhpName('Npcalvac');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CAUDES', 'Caudes', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('CAUHAS', 'Cauhas', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('DISDES', 'Disdes', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('DISHAS', 'Dishas', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECREI', 'Fecrei', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('DIAVAC', 'Diavac', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('DIANHAB', 'Dianhab', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DIAANT', 'Diaant', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DIAPAG', 'Diapag', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DIADIS', 'Diadis', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DIABON', 'Diabon', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONVAC', 'Monvac', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('MONBON', 'Monbon', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('STAPAG', 'Stapag', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 