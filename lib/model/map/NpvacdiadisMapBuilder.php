<?php


	
class NpvacdiadisMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpvacdiadisMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npvacdiadis');
		$tMap->setPhpName('Npvacdiadis');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('RANGODESDE', 'Rangodesde', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('RANGOHASTA', 'Rangohasta', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DIADIS', 'Diadis', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 