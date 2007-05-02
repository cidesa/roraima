<?php


	
class FcrecconMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcrecconMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcreccon');
		$tMap->setPhpName('Fcreccon');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODREC', 'Codrec', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECENT', 'Fecent', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('NUMLIC', 'Numlic', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('TIPSOL', 'Tipsol', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 