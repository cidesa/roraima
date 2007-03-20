<?php


	
class NptipconOldMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NptipconOldMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('nptipcon_old');
		$tMap->setPhpName('NptipconOld');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODTIPCON', 'Codtipcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTIPCON', 'Destipcon', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('FREPAGCON', 'Frepagcon', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('ALICUOCON', 'Alicuocon', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DIABONFINANO', 'Diabonfinano', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DIABONVAC', 'Diabonvac', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FECINIREG', 'Fecinireg', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('ART146', 'Art146', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DIAANO', 'Diaano', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 