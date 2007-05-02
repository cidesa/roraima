<?php


	
class FcrecdesgMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcrecdesgMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcrecdesg');
		$tMap->setPhpName('Fcrecdesg');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODREDE', 'Codrede', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('DIAS', 'Dias', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PORCIEN', 'Porcien', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 