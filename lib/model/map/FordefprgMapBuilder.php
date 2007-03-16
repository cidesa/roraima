<?php


	
class FordefprgMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefprgMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fordefprg');
		$tMap->setPhpName('Fordefprg');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPRG', 'Codprg', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESPRG', 'Desprg', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addColumn('PRBASOPRG', 'Prbasoprg', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 