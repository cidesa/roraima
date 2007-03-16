<?php


	
class CpempresaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CpempresaMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('cpempresa');
		$tMap->setPhpName('Cpempresa');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('RIFEMP', 'Rifemp', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NITEMP', 'Nitemp', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DESEMP', 'Desemp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIREMP', 'Diremp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELEMP', 'Telemp', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 