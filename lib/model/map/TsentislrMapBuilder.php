<?php


	
class TsentislrMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsentislrMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tsentislr');
		$tMap->setPhpName('Tsentislr');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMDEP', 'Numdep', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('BANCO', 'Banco', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 