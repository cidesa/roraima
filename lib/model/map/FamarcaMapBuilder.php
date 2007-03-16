<?php


	
class FamarcaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FamarcaMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('famarca');
		$tMap->setPhpName('Famarca');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODMAR', 'Codmar', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMMAR', 'Nommar', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 