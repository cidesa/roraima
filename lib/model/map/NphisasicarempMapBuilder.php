<?php


	
class NphisasicarempMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NphisasicarempMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('nphisasicaremp');
		$tMap->setPhpName('Nphisasicaremp');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECASI', 'Fecasi', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, false, 51);

		$tMap->addColumn('NOMCAR', 'Nomcar', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('NOMNOM', 'Nomnom', 'string', CreoleTypes::VARCHAR, false, 29);

		$tMap->addColumn('NOMCAT', 'Nomcat', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('UNIEJE', 'Unieje', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('SUELDO', 'Sueldo', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('MONTONOMINA', 'Montonomina', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODTIPGAS', 'Codtipgas', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 