<?php


	
class RhdefvalinsMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RhdefvalinsMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('rhdefvalins');
		$tMap->setPhpName('Rhdefvalins');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODVALINS', 'Codvalins', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESVALINS', 'Desvalins', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('OBSVALINS', 'Obsvalins', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 