<?php


	
class NptasfidMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NptasfidMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('nptasfid');
		$tMap->setPhpName('Nptasfid');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('FECDESDE', 'Fecdesde', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECHASTA', 'Fechasta', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('TASA', 'Tasa', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 