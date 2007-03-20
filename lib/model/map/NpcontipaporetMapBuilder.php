<?php


	
class NpcontipaporetMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpcontipaporetMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npcontipaporet');
		$tMap->setPhpName('Npcontipaporet');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODTIPAPO', 'Codtipapo', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 