<?php


	
class CstotartfasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CstotartfasMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('cstotartfas');
		$tMap->setPhpName('Cstotartfas');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPROD', 'Codprod', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODFAS', 'Codfas', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('MONFAS', 'Monfas', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('TIPCAL', 'Tipcal', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NROORD', 'Nroord', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 