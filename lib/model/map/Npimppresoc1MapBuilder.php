<?php


	
class Npimppresoc1MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Npimppresoc1MapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npimppresoc1');
		$tMap->setPhpName('Npimppresoc1');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECCOR', 'Feccor', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('FECFIN', 'Fecfin', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('TASINT', 'Tasint', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DIADIF', 'Diadif', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CAPVIE', 'Capvie', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CAPCAP', 'Capcap', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('INTDEV', 'Intdev', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('INTACUM', 'Intacum', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('ADEPRE', 'Adepre', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 