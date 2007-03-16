<?php


	
class ApliUserMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ApliUserMapBuilder';	

    
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
		$this->dbMap = Propel::getDatabaseMap('sima_user');
		
		$tMap = $this->dbMap->addTable('apli_user');
		$tMap->setPhpName('ApliUser');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODAPL', 'Codapl', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMOPC', 'Nomopc', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('PRIUSE', 'Priuse', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 