<?php


	
class CbarrasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CbarrasMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('cbarras');
		$tMap->setPhpName('Cbarras');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODIGV', 'Codigv', 'string', CreoleTypes::VARCHAR, false, 150);

		$tMap->addColumn('CODBAR', 'Codbar', 'string', CreoleTypes::VARCHAR, false, 600);

		$tMap->addColumn('DESCRI', 'Descri', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 