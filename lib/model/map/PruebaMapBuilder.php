<?php


	
class PruebaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PruebaMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('prueba');
		$tMap->setPhpName('Prueba');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('PASUSE', 'Pasuse', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('ENCPAS', 'Encpas', 'string', CreoleTypes::VARCHAR, false, 4000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 