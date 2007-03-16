<?php


	
class CobtipmovMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CobtipmovMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('cobtipmov');
		$tMap->setPhpName('Cobtipmov');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODMOV', 'Codmov', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESMOV', 'Desmov', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NOMABR', 'Nomabr', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DEBCRE', 'Debcre', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CTACON', 'Ctacon', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 