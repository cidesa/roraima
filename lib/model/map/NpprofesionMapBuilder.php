<?php


	
class NpprofesionMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpprofesionMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npprofesion');
		$tMap->setPhpName('Npprofesion');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPROFES', 'Codprofes', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESPROFES', 'Desprofes', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 