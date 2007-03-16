<?php


	
class ForcosequMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForcosequMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('forcosequ');
		$tMap->setPhpName('Forcosequ');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CANREM', 'Canrem', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CANDEF', 'Candef', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TOTART', 'Totart', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('TOTCAN', 'Totcan', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('COSULT', 'Cosult', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 