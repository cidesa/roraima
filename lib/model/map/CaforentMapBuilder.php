<?php


	
class CaforentMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaforentMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('caforent');
		$tMap->setPhpName('Caforent');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODFORENT', 'Codforent', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESFORENT', 'Desforent', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 