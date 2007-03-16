<?php


	
class CsdefmanobrMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CsdefmanobrMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('csdefmanobr');
		$tMap->setPhpName('Csdefmanobr');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODMANOBR', 'Codmanobr', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DESMANOBR', 'Desmanobr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('UNIMED', 'Unimed', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('COSUNI', 'Cosuni', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 