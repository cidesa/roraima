<?php


	
class BnrevactMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnrevactMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('bnrevact');
		$tMap->setPhpName('Bnrevact');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('FECREV', 'Fecrev', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('MONMUEREV', 'Monmuerev', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONINMREV', 'Moninmrev', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONSEMREV', 'Monsemrev', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONIMNREV', 'Monimnrev', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 