<?php


	
class BnparbieMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnparbieMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('bnparbie');
		$tMap->setPhpName('Bnparbie');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('PARDES', 'Pardes', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('PARHAS', 'Parhas', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('VALRCP', 'Valrcp', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 