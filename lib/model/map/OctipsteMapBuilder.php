<?php


	
class OctipsteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OctipsteMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('octipste');
		$tMap->setPhpName('Octipste');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODSTE', 'Codste', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESSTE', 'Desste', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('TIPSTE', 'Tipste', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STASTE', 'Staste', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 