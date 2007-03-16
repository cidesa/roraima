<?php


	
class TsmovtraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsmovtraMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tsmovtra');
		$tMap->setPhpName('Tsmovtra');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFTRA', 'Reftra', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('FECTRA', 'Fectra', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('DESTRA', 'Destra', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('CTAORI', 'Ctaori', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CTADES', 'Ctades', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('MONTRA', 'Montra', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('FECING', 'Fecing', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 