<?php


	
class ForcorsubsecMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForcorsubsecMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('forcorsubsec');
		$tMap->setPhpName('Forcorsubsec');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODSEC', 'Codsec', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CORSUBSEC', 'Corsubsec', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 