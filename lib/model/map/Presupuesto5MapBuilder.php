<?php


	
class Presupuesto5MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Presupuesto5MapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('presupuesto5');
		$tMap->setPhpName('Presupuesto5');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('NOMPRE', 'Nompre', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('STACOD', 'Stacod', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODUNI', 'Coduni', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('ESTATUS', 'Estatus', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('ASIG', 'Asig', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 