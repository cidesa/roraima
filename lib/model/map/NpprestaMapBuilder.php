<?php


	
class NpprestaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpprestaMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('nppresta');
		$tMap->setPhpName('Nppresta');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECDES', 'Fecdes', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('FECHAS', 'Fechas', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('MONACU', 'Monacu', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 