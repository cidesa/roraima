<?php


	
class FcaliusoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcaliusoMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcaliuso');
		$tMap->setPhpName('Fcaliuso');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('CODUSO', 'Coduso', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addPrimaryKey('ANOVIG', 'Anovig', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMUSO', 'Nomuso', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('ALIMON', 'Alimon', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PORMON', 'Pormon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 