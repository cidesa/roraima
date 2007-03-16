<?php


	
class CsrecobrdirMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CsrecobrdirMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('csrecobrdir');
		$tMap->setPhpName('Csrecobrdir');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPROD', 'Codprod', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODFAS', 'Codfas', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CANEMP', 'Canemp', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('HOREMP', 'Horemp', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TIPCON', 'Tipcon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('COSTOT', 'Costot', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('JORNADA', 'Jornada', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIAVIA', 'Diavia', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NROORD', 'Nroord', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 