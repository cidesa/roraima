<?php


	
class NpdesnivMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpdesnivMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npdesniv');
		$tMap->setPhpName('Npdesniv');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODIGO', 'Codigo', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('CONSEC', 'Consec', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('NOMABR', 'Nomabr', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NOMEXT', 'Nomext', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('LONNIV', 'Lonniv', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 