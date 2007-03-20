<?php


	
class Tabla43MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Tabla43MapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tabla43');
		$tMap->setPhpName('Tabla43');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECCOM', 'Feccom', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('DEBCRE', 'Debcre', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('NUMASI', 'Numasi', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('REFASI', 'Refasi', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('DESASI', 'Desasi', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONASI', 'Monasi', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 