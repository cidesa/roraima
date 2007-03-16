<?php


	
class NpbonocontMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpbonocontMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npbonocont');
		$tMap->setPhpName('Npbonocont');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODTIPCON', 'Codtipcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('ANOVIG', 'Anovig', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('DESDE', 'Desde', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('HASTA', 'Hasta', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('DIAUTI', 'Diauti', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('DIAVAC', 'Diavac', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('ANOVIGHAS', 'Anovighas', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('CALINC', 'Calinc', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ANTAP', 'Antap', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ANTAPVAC', 'Antapvac', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 