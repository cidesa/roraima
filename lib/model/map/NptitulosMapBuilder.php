<?php


	
class NptitulosMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NptitulosMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('nptitulos');
		$tMap->setPhpName('Nptitulos');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODTIT', 'Codtit', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESTIT', 'Destit', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 