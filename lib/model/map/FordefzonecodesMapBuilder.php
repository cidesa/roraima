<?php


	
class FordefzonecodesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefzonecodesMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fordefzonecodes');
		$tMap->setPhpName('Fordefzonecodes');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODZONECO', 'Codzoneco', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESZONECO', 'Deszoneco', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 