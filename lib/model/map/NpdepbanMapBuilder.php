<?php


	
class NpdepbanMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpdepbanMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npdepban');
		$tMap->setPhpName('Npdepban');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMLIN', 'Numlin', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DESDEP', 'Desdep', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 