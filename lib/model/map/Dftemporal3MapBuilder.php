<?php


	
class Dftemporal3MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Dftemporal3MapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('dftemporal3');
		$tMap->setPhpName('Dftemporal3');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODIGO', 'Codigo', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('ABR', 'Abr', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('VIDA', 'Vida', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('BEN', 'Ben', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('USU', 'Usu', 'string', CreoleTypes::CHAR, true);

		$tMap->addColumn('FECHAREC', 'Fecharec', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('FECHAATE', 'Fechaate', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('ESTAD', 'Estad', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('RUTA', 'Ruta', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMTAB', 'Nomtab', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('UNIDADORI', 'Unidadori', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('UNIDAD', 'Unidad', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('ANUATE', 'Anuate', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CHKUNI1', 'Chkuni1', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CHKUNI2', 'Chkuni2', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CHKUNI3', 'Chkuni3', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CHKUNI4', 'Chkuni4', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CHKUNI5', 'Chkuni5', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CHKUNI6', 'Chkuni6', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CHKUNI7', 'Chkuni7', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 