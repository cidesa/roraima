<?php


	
class OpasiordaprMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpasiordaprMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('opasiordapr');
		$tMap->setPhpName('Opasiordapr');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CTAGAS', 'Ctagas', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTAPAG', 'Ctapag', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 