<?php


	
class CamarartMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CamarartMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('camarart');
		$tMap->setPhpName('Camarart');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODMAR', 'Codmar', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('NOMMAR', 'Nommar', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 