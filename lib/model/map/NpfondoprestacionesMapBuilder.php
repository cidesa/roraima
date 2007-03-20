<?php


	
class NpfondoprestacionesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpfondoprestacionesMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npfondoprestaciones');
		$tMap->setPhpName('Npfondoprestaciones');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCONACUDIA', 'Codconacudia', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCONACUMONTO', 'Codconacumonto', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCONACUINTERES', 'Codconacuinteres', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CAPITALIZARINTERES', 'Capitalizarinteres', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('ACUMPRESTAMOS', 'Acumprestamos', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CODCONPRESTAMO', 'Codconprestamo', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 