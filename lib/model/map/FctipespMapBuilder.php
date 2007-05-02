<?php


	
class FctipespMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FctipespMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fctipesp');
		$tMap->setPhpName('Fctipesp');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('TIPESP', 'Tipesp', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addPrimaryKey('ANOVIG', 'Anovig', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIP', 'Destip', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('PORMON', 'Pormon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ALIMON', 'Alimon', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STATIP', 'Statip', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MINTRI', 'Mintri', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 