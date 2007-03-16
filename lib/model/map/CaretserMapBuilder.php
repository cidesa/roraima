<?php


	
class CaretserMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaretserMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('caretser');
		$tMap->setPhpName('Caretser');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODSER', 'Codser', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODRET', 'Codret', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 