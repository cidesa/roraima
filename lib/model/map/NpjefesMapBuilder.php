<?php


	
class NpjefesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpjefesMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npjefes');
		$tMap->setPhpName('Npjefes');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('PRESUPUESTO', 'Presupuesto', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ADMINISTRACION', 'Administracion', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PERSONAL', 'Personal', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('RECTOR', 'Rector', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('VICERECTOR', 'Vicerector', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 