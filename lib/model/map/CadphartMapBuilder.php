<?php


	
class CadphartMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CadphartMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('cadphart');
		$tMap->setPhpName('Cadphart');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('DPHART', 'Dphart', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('FECDPH', 'Fecdph', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('REQART', 'Reqart', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESDPH', 'Desdph', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODORI', 'Codori', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('STADPH', 'Stadph', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('REFPAG', 'Refpag', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('TIPDPH', 'Tipdph', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODCLI', 'Codcli', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('MONDPH', 'Mondph', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('OBSDPH', 'Obsdph', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FORDESP', 'Fordesp', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('REAPOR', 'Reapor', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 