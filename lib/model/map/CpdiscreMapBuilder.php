<?php


	
class CpdiscreMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CpdiscreMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('cpdiscre');
		$tMap->setPhpName('Cpdiscre');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('SECTOR', 'Sector', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('PARTIDA', 'Partida', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 