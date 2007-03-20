<?php


	
class OcobrfotMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcobrfotMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('ocobrfot');
		$tMap->setPhpName('Ocobrfot');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODOBR', 'Codobr', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('NUMFOT', 'Numfot', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('ANGFOT', 'Angfot', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DESFOT', 'Desfot', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FECFOT', 'Fecfot', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('RUTFOT', 'Rutfot', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 