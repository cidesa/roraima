<?php


	
class CamotfalMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CamotfalMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('camotfal');
		$tMap->setPhpName('Camotfal');

		$tMap->setUseIdGenerator(true);
 
		$tMap->setPrimaryKeyMethodInfo('camotfal_SEQ');

		$tMap->addColumn('CODFAL', 'Codfal', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESFAL', 'Desfal', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('TIPFAL', 'Tipfal', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 