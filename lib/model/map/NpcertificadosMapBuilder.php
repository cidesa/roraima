<?php


	
class NpcertificadosMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpcertificadosMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npcertificados');
		$tMap->setPhpName('Npcertificados');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODADI', 'Codadi', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODCER', 'Codcer', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESCER', 'Descer', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 