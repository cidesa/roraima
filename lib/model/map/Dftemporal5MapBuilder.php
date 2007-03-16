<?php


	
class Dftemporal5MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Dftemporal5MapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('dftemporal5');
		$tMap->setPhpName('Dftemporal5');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMBEN', 'Nomben', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('TELBEN', 'Telben', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NITBEN', 'Nitben', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 