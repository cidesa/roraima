<?php


	
class FcestadoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcestadoMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcestado');
		$tMap->setPhpName('Fcestado');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addForeignPrimaryKey('CODPAI', 'Codpai', 'string' , CreoleTypes::VARCHAR, 'fcpais', 'CODPAI', true, 4);

		$tMap->addColumn('NOMEDO', 'Nomedo', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 