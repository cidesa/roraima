<?php


	
class NpsitempMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpsitempMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npsitemp');
		$tMap->setPhpName('Npsitemp');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODSITEMP', 'Codsitemp', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DESSITEMP', 'Dessitemp', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CALNOM', 'Calnom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 