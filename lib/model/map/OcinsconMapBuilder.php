<?php


	
class OcinsconMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcinsconMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('ocinscon');
		$tMap->setPhpName('Ocinscon');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('NUMINS', 'Numins', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('FECCOM', 'Feccom', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECTER', 'Fecter', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('POROBREJE', 'Porobreje', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PORTIETRA', 'Portietra', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 