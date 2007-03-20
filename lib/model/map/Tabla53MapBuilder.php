<?php


	
class Tabla53MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Tabla53MapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tabla53');
		$tMap->setPhpName('Tabla53');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFPAG', 'Refpag', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECPAG', 'Fecpag', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECCOM', 'Feccom', 'int', CreoleTypes::DATE, true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 