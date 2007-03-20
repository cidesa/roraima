<?php


	
class NpintpreMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpintpreMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npintpre');
		$tMap->setPhpName('Npintpre');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMDEC', 'Numdec', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('DESPRE', 'Despre', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('HASPRE', 'Haspre', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('PORPRE', 'Porpre', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 