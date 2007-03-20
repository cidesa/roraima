<?php


	
class NptipaportesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NptipaportesMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('nptipaportes');
		$tMap->setPhpName('Nptipaportes');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODTIPAPO', 'Codtipapo', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIPAPO', 'Destipapo', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('PORRET', 'Porret', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PORAPO', 'Porapo', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 