<?php


	
class BdcamposMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BdcamposMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('bdcampos');
		$tMap->setPhpName('Bdcampos');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NOMCAMP1', 'Nomcamp1', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NOMCAMP2', 'Nomcamp2', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NOMCAMP3', 'Nomcamp3', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NOMCAMP4', 'Nomcamp4', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NOMCAMP5', 'Nomcamp5', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NOMCAMP6', 'Nomcamp6', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NOMCAMP7', 'Nomcamp7', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NOMCAMP8', 'Nomcamp8', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CRITERIO', 'Criterio', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 