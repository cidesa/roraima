<?php


	
class Tabla54MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Tabla54MapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tabla54');
		$tMap->setPhpName('Tabla54');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFPAG', 'Refpag', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECPAG', 'Fecpag', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('REFCAU', 'Refcau', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECCAU', 'Feccau', 'int', CreoleTypes::DATE, true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 