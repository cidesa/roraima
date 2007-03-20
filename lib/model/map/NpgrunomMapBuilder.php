<?php


	
class NpgrunomMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpgrunomMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npgrunom');
		$tMap->setPhpName('Npgrunom');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODGRUNOM', 'Codgrunom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('NOMGRUNOM', 'Nomgrunom', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECHA1', 'Fecha1', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECHA2', 'Fecha2', 'int', CreoleTypes::DATE, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 