<?php


	
class NpasicarracempMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpasicarracempMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npasicarracemp');
		$tMap->setPhpName('Npasicarracemp');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODCARRAC', 'Codcarrac', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODSECUE', 'Codsecue', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('COMCAR', 'Comcar', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PRICAR', 'Pricar', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CODACCADM', 'Codaccadm', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODREGPAI', 'Codregpai', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODREGEDO', 'Codregedo', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODREGCIU', 'Codregciu', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODCATRAC', 'Codcatrac', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODBANRAC', 'Codbanrac', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODGRULAB', 'Codgrulab', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NOMSUP', 'Nomsup', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CARSUP', 'Carsup', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODNIVORG', 'Codnivorg', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 