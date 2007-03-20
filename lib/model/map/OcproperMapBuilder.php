<?php


	
class OcproperMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcproperMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('ocproper');
		$tMap->setPhpName('Ocproper');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CEDPER', 'Cedper', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 