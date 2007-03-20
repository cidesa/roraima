<?php


	
class TssecofiMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TssecofiMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tssecofi');
		$tMap->setPhpName('Tssecofi');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODSECOFI', 'Codsecofi', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('DESSECOFI', 'Dessecofi', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 