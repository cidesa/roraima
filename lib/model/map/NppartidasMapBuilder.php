<?php


	
class NppartidasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NppartidasMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('nppartidas');
		$tMap->setPhpName('Nppartidas');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('NOMPAR', 'Nompar', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 