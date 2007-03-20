<?php


	
class OcinsvalMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcinsvalMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('ocinsval');
		$tMap->setPhpName('Ocinsval');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CEDINS', 'Cedins', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('NUMVAL', 'Numval', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CODTIPVAL', 'Codtipval', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('NOMINS', 'Nomins', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NUMCIV', 'Numciv', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 