<?php


	
class FcajusteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcajusteMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcajuste');
		$tMap->setPhpName('Fcajuste');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMAJU', 'Numaju', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECAJU', 'Fecaju', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('DESAJU', 'Desaju', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('NUMDEC', 'Numdec', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('STAAJU', 'Staaju', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MONAJU', 'Monaju', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONREB', 'Monreb', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONEXO', 'Monexo', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONIMP', 'Monimp', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 