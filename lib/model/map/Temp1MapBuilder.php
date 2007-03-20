<?php


	
class Temp1MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Temp1MapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('temp1');
		$tMap->setPhpName('Temp1');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('DESCTA', 'Descta', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('FECCIE', 'Feccie', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('DEBCRE', 'Debcre', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CARGAB', 'Cargab', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 