<?php


	
class FcrenlicMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcrenlicMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcrenlic');
		$tMap->setPhpName('Fcrenlic');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMLIC', 'Numlic', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('FECREN', 'Fecren', 'int', CreoleTypes::DATE, true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 