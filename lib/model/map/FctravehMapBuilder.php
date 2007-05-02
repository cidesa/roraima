<?php


	
class FctravehMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FctravehMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fctraveh');
		$tMap->setPhpName('Fctraveh');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('NUMTRA', 'Numtra', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('PLAVEH', 'Plaveh', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECTRA', 'Fectra', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('RIFREP', 'Rifrep', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('RIFCONANT', 'Rifconant', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('RIFREPANT', 'Rifrepant', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('FUNREC', 'Funrec', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 