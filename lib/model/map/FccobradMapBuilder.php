<?php


	
class FccobradMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FccobradMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fccobrad');
		$tMap->setPhpName('Fccobrad');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCOB', 'Codcob', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CEDCOB', 'Cedcob', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMCOB', 'Nomcob', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('DIRCOB', 'Dircob', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TELCOB', 'Telcob', 'string', CreoleTypes::VARCHAR, false, 11);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 