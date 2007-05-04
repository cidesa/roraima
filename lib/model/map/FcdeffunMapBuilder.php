<?php


	
class FcdeffunMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdeffunMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcdeffun');
		$tMap->setPhpName('Fcdeffun');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODFUN', 'Codfun', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMFUN', 'Nomfun', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addForeignKey('CODUNIADM', 'Coduniadm', 'string', CreoleTypes::VARCHAR, 'fcdefuniadm', 'CODUNIADM', true, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 