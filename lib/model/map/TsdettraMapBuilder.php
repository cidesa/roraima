<?php


	
class TsdettraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsdettraMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tsdettra');
		$tMap->setPhpName('Tsdettra');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFTRA', 'Reftra', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CTAORI', 'Ctaori', 'string', CreoleTypes::VARCHAR, true, 18);

		$tMap->addColumn('CTADES', 'Ctades', 'string', CreoleTypes::VARCHAR, true, 18);

		$tMap->addColumn('AUMDIS', 'Aumdis', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('MONTRA', 'Montra', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 