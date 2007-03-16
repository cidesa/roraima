<?php


	
class CdbarrasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CdbarrasMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('cdbarras');
		$tMap->setPhpName('Cdbarras');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODIGV', 'Codigv', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODBAR', 'Codbar', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DESCRI', 'Descri', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 