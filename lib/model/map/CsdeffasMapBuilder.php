<?php


	
class CsdeffasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CsdeffasMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('csdeffas');
		$tMap->setPhpName('Csdeffas');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODFAS', 'Codfas', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMFAS', 'Nomfas', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 