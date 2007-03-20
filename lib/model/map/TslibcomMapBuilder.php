<?php


	
class TslibcomMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TslibcomMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tslibcom');
		$tMap->setPhpName('Tslibcom');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMLIN', 'Numlin', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DESLIN', 'Deslin', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 