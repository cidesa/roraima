<?php


	
class FcrecdespagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcrecdespagMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcrecdespag');
		$tMap->setPhpName('Fcrecdespag');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('NUMPAG', 'Numpag', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addForeignPrimaryKey('CODREDE', 'Codrede', 'string' , CreoleTypes::VARCHAR, 'fcdefdesc', 'CODDES', true, 4);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 