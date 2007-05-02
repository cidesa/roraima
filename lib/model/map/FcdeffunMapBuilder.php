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

		$tMap->addPrimaryKey('CODFUN', 'Codfun', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMFUN', 'Nomfun', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addForeignKey('CODUNIADM', 'Coduniadm', 'string', CreoleTypes::VARCHAR, 'fcdefuniadm', 'CODUNIADM', false, 3);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 