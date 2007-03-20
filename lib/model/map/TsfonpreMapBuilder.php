<?php


	
class TsfonpreMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsfonpreMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tsfonpre');
		$tMap->setPhpName('Tsfonpre');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMCHE', 'Numche', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('TIPEMP', 'Tipemp', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('TIPPRE', 'Tippre', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 