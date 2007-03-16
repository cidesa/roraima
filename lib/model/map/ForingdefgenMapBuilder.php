<?php


	
class ForingdefgenMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForingdefgenMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('foringdefgen');
		$tMap->setPhpName('Foringdefgen');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('ESCAPR', 'Escapr', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('GENING', 'Gening', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FACCON', 'Faccon', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 