<?php


	
class NptabpreMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NptabpreMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('nptabpre');
		$tMap->setPhpName('Nptabpre');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('FECPRE', 'Fecpre', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DIAMES', 'Diames', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('DIAANO', 'Diaano', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('INTERES', 'Interes', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 