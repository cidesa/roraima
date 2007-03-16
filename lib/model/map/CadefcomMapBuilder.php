<?php


	
class CadefcomMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CadefcomMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('cadefcom');
		$tMap->setPhpName('Cadefcom');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('NUMCON', 'Numcon', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('NROINI', 'Nroini', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('AFEUNI', 'Afeuni', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 