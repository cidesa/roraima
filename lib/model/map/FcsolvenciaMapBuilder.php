<?php


	
class FcsolvenciaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcsolvenciaMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcsolvencia');
		$tMap->setPhpName('Fcsolvencia');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODSOL', 'Codsol', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addForeignKey('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, 'fctipsol', 'CODTIP', false, 2);

		$tMap->addColumn('FECEXP', 'Fecexp', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('NUMLIC', 'Numlic', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRCON', 'Dircon', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CODFUE', 'Codfue', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('STASOL', 'Stasol', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MOTIVO', 'Motivo', 'string', CreoleTypes::VARCHAR, false, 254);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 