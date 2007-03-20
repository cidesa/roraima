<?php


	
class OcparinsMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcparinsMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('ocparins');
		$tMap->setPhpName('Ocparins');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('NUMINS', 'Numins', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('POREJE', 'Poreje', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('OBSINS', 'Obsins', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 