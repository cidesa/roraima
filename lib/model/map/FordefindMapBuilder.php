<?php


	
class FordefindMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefindMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fordefind');
		$tMap->setPhpName('Fordefind');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODIND', 'Codind', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('DESIND', 'Desind', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 