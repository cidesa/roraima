<?php


	
class NprelconquiMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NprelconquiMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('nprelconqui');
		$tMap->setPhpName('Nprelconqui');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CANTIDAD', 'Cantidad', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECEXP', 'Fecexp', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('CALCON', 'Calcon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ACTCON', 'Actcon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NOMSUS', 'Nomsus', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 