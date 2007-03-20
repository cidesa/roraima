<?php


	
class NpforcarempMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpforcarempMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npforcaremp');
		$tMap->setPhpName('Npforcaremp');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('SUEBAS', 'Suebas', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('SUPLEN', 'Suplen', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PRIANT', 'Priant', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('HEDIUR', 'Hediur', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PORDIU', 'Pordiu', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('HENOCT', 'Henoct', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PORNOC1', 'Pornoc1', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PORNOC2', 'Pornoc2', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('BONVAC', 'Bonvac', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CLAU74', 'Clau74', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('OTRCOM', 'Otrcom', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PRIEFI', 'Priefi', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PRITRA', 'Pritra', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('AGUINAL', 'Aguinal', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 