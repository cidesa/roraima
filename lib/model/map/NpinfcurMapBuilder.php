<?php


	
class NpinfcurMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpinfcurMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npinfcur');
		$tMap->setPhpName('Npinfcur');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('NOMTIT', 'Nomtit', 'string', CreoleTypes::VARCHAR, true, 40);

		$tMap->addColumn('DESCUR', 'Descur', 'string', CreoleTypes::VARCHAR, false, 60);

		$tMap->addColumn('INSTIT', 'Instit', 'string', CreoleTypes::VARCHAR, true, 200);

		$tMap->addColumn('DURCUR', 'Durcur', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('ANOCUL', 'Anocul', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 