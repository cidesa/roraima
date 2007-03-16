<?php


	
class CpdocpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CpdocpagMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('cpdocpag');
		$tMap->setPhpName('Cpdocpag');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('TIPPAG', 'Tippag', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMEXT', 'Nomext', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('NOMABR', 'Nomabr', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('REFIER', 'Refier', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('AFEPRC', 'Afeprc', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('AFECOM', 'Afecom', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('AFECAU', 'Afecau', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('AFEPAG', 'Afepag', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('AFEDIS', 'Afedis', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 