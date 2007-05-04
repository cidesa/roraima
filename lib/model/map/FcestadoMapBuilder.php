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

		$tMap->addColumn('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addForeignKey('CODPAI', 'Codpai', 'string', CreoleTypes::VARCHAR, 'fcpais', 'CODPAI', true, 4);

		$tMap->addColumn('NOMEDO', 'Nomedo', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 