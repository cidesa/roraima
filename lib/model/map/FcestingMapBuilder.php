<?php


	
class FcestingMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcestingMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcesting');
		$tMap->setPhpName('Fcesting');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('ANO', 'Ano', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('PEREST', 'Perest', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 