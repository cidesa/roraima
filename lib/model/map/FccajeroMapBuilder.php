<?php


	
class FccajeroMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FccajeroMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fccajero');
		$tMap->setPhpName('Fccajero');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCAJ', 'Codcaj', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CEDCAJ', 'Cedcaj', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMCAJ', 'Nomcaj', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('DIRCAJ', 'Dircaj', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TELCAJ', 'Telcaj', 'string', CreoleTypes::VARCHAR, false, 11);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 