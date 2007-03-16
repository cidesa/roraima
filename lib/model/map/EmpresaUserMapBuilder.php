<?php


	
class EmpresaUserMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EmpresaUserMapBuilder';	

    
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
		$this->dbMap = Propel::getDatabaseMap('sima_user');
		
		$tMap = $this->dbMap->addTable('empresa');
		$tMap->setPhpName('EmpresaUser');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('DIREMP', 'Diremp', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TLFEMP', 'Tlfemp', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('PASSEMP', 'Passemp', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 