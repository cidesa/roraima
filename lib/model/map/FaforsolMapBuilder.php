<?php


	
class FaforsolMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FaforsolMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('faforsol');
		$tMap->setPhpName('Faforsol');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('FORSOL', 'Forsol', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMSOL', 'Nomsol', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 