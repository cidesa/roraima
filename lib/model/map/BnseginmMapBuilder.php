<?php


	
class BnseginmMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnseginmMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('bnseginm');
		$tMap->setPhpName('Bnseginm');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODMUE', 'Codmue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NROSEGINM', 'Nroseginm', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('FECSEGINM', 'Fecseginm', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('NOMSEGINM', 'Nomseginm', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('COBSEGINM', 'Cobseginm', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('MONSEGINM', 'Monseginm', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FECSEGVEN', 'Fecsegven', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('PROSEGINM', 'Proseginm', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('OBSSEGINM', 'Obsseginm', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('STASEGINM', 'Staseginm', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 