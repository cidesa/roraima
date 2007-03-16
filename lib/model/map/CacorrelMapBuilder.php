<?php


	
class CacorrelMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CacorrelMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('cacorrel');
		$tMap->setPhpName('Cacorrel');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CORCOM', 'Corcom', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CORSER', 'Corser', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CORSOL', 'Corsol', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CORREQ', 'Correq', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CORREC', 'Correc', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CORDES', 'Cordes', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CORCOT', 'Corcot', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CORTRA', 'Cortra', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 