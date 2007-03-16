<?php


	
class NpcargosocpMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpcargosocpMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npcargosocp');
		$tMap->setPhpName('Npcargosocp');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODPAS', 'Codpas', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODGRA', 'Codgra', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('SUELDO', 'Sueldo', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DESCAR', 'Descar', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('COMCAR', 'Comcar', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 