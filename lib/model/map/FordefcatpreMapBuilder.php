<?php


	
class FordefcatpreMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefcatpreMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fordefcatpre');
		$tMap->setPhpName('Fordefcatpre');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NOMCAT', 'Nomcat', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('DESCAT', 'Descat', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('CODUNI', 'Coduni', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('OBJSEC', 'Objsec', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 