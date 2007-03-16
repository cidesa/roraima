<?php


	
class CsotrgasindMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CsotrgasindMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('csotrgasind');
		$tMap->setPhpName('Csotrgasind');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODGAS', 'Codgas', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DESGAS', 'Desgas', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('COSGAS', 'Cosgas', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TIPMON', 'Tipmon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 