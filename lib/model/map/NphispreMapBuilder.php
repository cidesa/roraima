<?php


	
class NphispreMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NphispreMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('nphispre');
		$tMap->setPhpName('Nphispre');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODTIPPRE', 'Codtippre', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('FECHISPRE', 'Fechispre', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('DESHISPRE', 'Deshispre', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('MONPRE', 'Monpre', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('SALDO', 'Saldo', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 