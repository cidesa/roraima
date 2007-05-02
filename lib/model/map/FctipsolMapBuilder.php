<?php


	
class FctipsolMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FctipsolMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fctipsol');
		$tMap->setPhpName('Fctipsol');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESTIP', 'Destip', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MONSOL', 'Monsol', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('VALSOL', 'Valsol', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PRIVDEU', 'Privdeu', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PRIVMSG', 'Privmsg', 'string', CreoleTypes::VARCHAR, false, 3000);

		$tMap->addColumn('ANOCOM', 'Anocom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FUEING', 'Fueing', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('GENDEU', 'Gendeu', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 