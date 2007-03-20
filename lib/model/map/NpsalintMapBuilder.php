<?php


	
class NpsalintMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpsalintMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npsalint');
		$tMap->setPhpName('Npsalint');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODASI', 'Codasi', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('MONASI', 'Monasi', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FECINICON', 'Fecinicon', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECFINCON', 'Fecfincon', 'int', CreoleTypes::DATE, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 