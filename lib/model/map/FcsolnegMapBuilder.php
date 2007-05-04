<?php


	
class FcsolnegMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcsolnegMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcsolneg');
		$tMap->setPhpName('Fcsolneg');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMNEG', 'Numneg', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('MOTNEG', 'Motneg', 'string', CreoleTypes::VARCHAR, false, 210);

		$tMap->addColumn('FECNEG', 'Fecneg', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('RESOLU', 'Resolu', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('TOMON', 'Tomon', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FOLION', 'Folion', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMERON', 'Numeron', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FUNNEG', 'Funneg', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 