<?php


	
class NppercarMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NppercarMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('nppercar');
		$tMap->setPhpName('Nppercar');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPERFIL', 'Codperfil', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('PUNTOS', 'Puntos', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 