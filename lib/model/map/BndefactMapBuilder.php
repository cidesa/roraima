<?php


	
class BndefactMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BndefactMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('bndefact');
		$tMap->setPhpName('Bndefact');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('DESACT', 'Desact', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CANACT', 'Canact', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STAACT', 'Staact', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('VIDUTI', 'Viduti', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 