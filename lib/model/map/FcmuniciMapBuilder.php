<?php


	
class FcmuniciMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcmuniciMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcmunici');
		$tMap->setPhpName('Fcmunici');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addPrimaryKey('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addForeignPrimaryKey('CODPAI', 'Codpai', 'string' , CreoleTypes::VARCHAR, 'fcestado', 'CODPAI', true, 4);

		$tMap->addColumn('NOMMUN', 'Nommun', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 