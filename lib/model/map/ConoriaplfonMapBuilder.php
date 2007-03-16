<?php


	
class ConoriaplfonMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ConoriaplfonMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('conoriaplfon');
		$tMap->setPhpName('Conoriaplfon');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('DESCTA', 'Descta', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('OYAFON', 'Oyafon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ORDENOYA', 'Ordenoya', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FLUCAJ', 'Flucaj', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ORDENFLU', 'Ordenflu', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 