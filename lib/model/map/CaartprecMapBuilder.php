<?php


	
class CaartprecMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaartprecMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('caartprec');
		$tMap->setPhpName('Caartprec');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODPREC', 'Codprec', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('PREUNI', 'Preuni', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('OBSPREC', 'Obsprec', 'string', CreoleTypes::VARCHAR, false, 110);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 