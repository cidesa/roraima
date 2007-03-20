<?php


	
class NpfideicomisoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpfideicomisoMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npfideicomiso');
		$tMap->setPhpName('Npfideicomiso');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('FECNOM', 'Fecnom', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECASI', 'Fecasi', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('DIAS', 'Dias', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 