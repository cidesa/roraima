<?php


	
class FcdeuconMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdeuconMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcdeucon');
		$tMap->setPhpName('Fcdeucon');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFCON', 'Refcon', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NUMDEC', 'Numdec', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NUMERO', 'Numero', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 