<?php


	
class NpempleadosBancoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpempleadosBancoMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npempleados_banco');
		$tMap->setPhpName('NpempleadosBanco');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODEMPANT', 'Codempant', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('CODBAN', 'Codban', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CUENTA_BANCO', 'CuentaBanco', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 