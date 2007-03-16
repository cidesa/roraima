<?php


	
class CadphartserMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CadphartserMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('cadphartser');
		$tMap->setPhpName('Cadphartser');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('DPHART', 'Dphart', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECDPH', 'Fecdph', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('REQART', 'Reqart', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESDPH', 'Desdph', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CODORI', 'Codori', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('STADPH', 'Stadph', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 