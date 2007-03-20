<?php


	
class OcproequMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcproequMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('ocproequ');
		$tMap->setPhpName('Ocproequ');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CODEQU', 'Codequ', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('CANEQU', 'Canequ', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 