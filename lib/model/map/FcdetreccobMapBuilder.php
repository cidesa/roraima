<?php


	
class FcdetreccobMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdetreccobMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcdetreccob');
		$tMap->setPhpName('Fcdetreccob');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('NUMENT', 'Nument', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addPrimaryKey('CODREC', 'Codrec', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CODCOB', 'Codcob', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 