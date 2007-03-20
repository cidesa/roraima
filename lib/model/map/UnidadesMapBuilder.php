<?php


	
class UnidadesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.UnidadesMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('unidades');
		$tMap->setPhpName('Unidades');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('DESUBI', 'Desubi', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('STACOD', 'Stacod', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 