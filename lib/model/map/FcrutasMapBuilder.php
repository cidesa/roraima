<?php


	
class FcrutasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcrutasMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcrutas');
		$tMap->setPhpName('Fcrutas');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODRUT', 'Codrut', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('DESRUT', 'Desrut', 'string', CreoleTypes::VARCHAR, true, 120);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 