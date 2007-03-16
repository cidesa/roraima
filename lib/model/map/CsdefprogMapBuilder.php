<?php


	
class CsdefprogMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CsdefprogMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('csdefprog');
		$tMap->setPhpName('Csdefprog');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPROG', 'Codprog', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMPROG', 'Nomprog', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 