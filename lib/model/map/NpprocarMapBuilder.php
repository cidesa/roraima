<?php


	
class NpprocarMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpprocarMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npprocar');
		$tMap->setPhpName('Npprocar');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPROFES', 'Codprofes', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 