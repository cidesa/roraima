<?php


	
class FcsitjurinmMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcsitjurinmMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcsitjurinm');
		$tMap->setPhpName('Fcsitjurinm');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('CODSITINM', 'Codsitinm', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMSITINM', 'Nomsitinm', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('STASITINM', 'Stasitinm', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 