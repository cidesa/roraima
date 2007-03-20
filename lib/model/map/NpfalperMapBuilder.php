<?php


	
class NpfalperMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpfalperMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npfalper');
		$tMap->setPhpName('Npfalper');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODMOT', 'Codmot', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NRODIA', 'Nrodia', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FECDES', 'Fecdes', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('FECHAS', 'Fechas', 'int', CreoleTypes::DATE, true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 