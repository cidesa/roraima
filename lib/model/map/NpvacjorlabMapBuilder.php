<?php


	
class NpvacjorlabMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpvacjorlabMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npvacjorlab');
		$tMap->setPhpName('Npvacjorlab');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('LUNES', 'Lunes', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MARTES', 'Martes', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MIERCOLES', 'Miercoles', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('JUEVES', 'Jueves', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('VIERNES', 'Viernes', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('SABADO', 'Sabado', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DOMINGO', 'Domingo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 