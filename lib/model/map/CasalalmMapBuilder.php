<?php


	
class CasalalmMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CasalalmMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('casalalm');
		$tMap->setPhpName('Casalalm');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODSAL', 'Codsal', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECSAL', 'Fecsal', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('DESSAL', 'Dessal', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('MONSAL', 'Monsal', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STASAL', 'Stasal', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('TIPMOV', 'Tipmov', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 