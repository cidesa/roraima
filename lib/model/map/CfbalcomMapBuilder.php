<?php


	
class CfbalcomMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CfbalcomMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('cfbalcom');
		$tMap->setPhpName('Cfbalcom');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('ORDEN', 'Orden', 'string', CreoleTypes::VARCHAR, false, 34);

		$tMap->addColumn('TITULO', 'Titulo', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CUENTA', 'Cuenta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DEBITO', 'Debito', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CREDITO', 'Credito', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('SALDO', 'Saldo', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CARGABLE', 'Cargable', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 