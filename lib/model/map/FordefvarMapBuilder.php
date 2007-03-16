<?php


	
class FordefvarMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefvarMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fordefvar');
		$tMap->setPhpName('Fordefvar');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODVAR', 'Codvar', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMEXT', 'Nomext', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NOMABR', 'Nomabr', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('VALDEF', 'Valdef', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TIPVAR', 'Tipvar', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STAVAR', 'Stavar', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 