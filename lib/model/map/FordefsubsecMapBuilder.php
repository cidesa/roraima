<?php


	
class FordefsubsecMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefsubsecMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fordefsubsec');
		$tMap->setPhpName('Fordefsubsec');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODSEC', 'Codsec', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODSUBSEC', 'Codsubsec', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMSUBSEC', 'Nomsubsec', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 