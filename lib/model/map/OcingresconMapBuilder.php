<?php


	
class OcingresconMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcingresconMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('ocingrescon');
		$tMap->setPhpName('Ocingrescon');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CEDING', 'Ceding', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NOMING', 'Noming', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NROCOLING', 'Nrocoling', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 