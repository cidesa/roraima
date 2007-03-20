<?php


	
class NpdefparMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpdefparMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npdefpar');
		$tMap->setPhpName('Npdefpar');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCOL', 'Codcol', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NOMCOL', 'Nomcol', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TIPCOL', 'Tipcol', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('LONCOL', 'Loncol', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 