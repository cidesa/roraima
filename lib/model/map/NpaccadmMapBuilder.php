<?php


	
class NpaccadmMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpaccadmMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npaccadm');
		$tMap->setPhpName('Npaccadm');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODACCADM', 'Codaccadm', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESACCADM', 'Desaccadm', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 