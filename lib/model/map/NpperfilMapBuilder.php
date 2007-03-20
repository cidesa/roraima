<?php


	
class NpperfilMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpperfilMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npperfil');
		$tMap->setPhpName('Npperfil');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPERFIL', 'Codperfil', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESPERFIL', 'Desperfil', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 