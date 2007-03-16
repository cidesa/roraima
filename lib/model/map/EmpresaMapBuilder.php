<?php


	
class EmpresaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EmpresaMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('empresa');
		$tMap->setPhpName('Empresa');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('DIREMP', 'Diremp', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('TLFEMP', 'Tlfemp', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('CIUEMP', 'Ciuemp', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('URLEMP', 'Urlemp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FAXEMP', 'Faxemp', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CODPOS', 'Codpos', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('GOBEDO', 'Gobedo', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CONEDO', 'Conedo', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CLEEDO', 'Cleedo', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRPRE', 'Dirpre', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MUNEMP', 'Munemp', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CIEEDO', 'Cieedo', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODCTAGAS', 'Codctagas', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTABAN', 'Codctaban', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTARET', 'Codctaret', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTABEN', 'Codctaben', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTAART', 'Codctaart', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTAGASHAS', 'Codctagashas', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTABANHAS', 'Codctabanhas', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTARETHAS', 'Codctarethas', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTABENHAS', 'Codctabenhas', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTAARTHAS', 'Codctaarthas', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTAPAGEJE', 'Codctapageje', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTAINGDEVN', 'Codctaingdevn', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTAINGDEV', 'Codctaingdev', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('DIRADM', 'Diradm', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRFIN', 'Dirfin', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRPER', 'Dirper', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRGEN', 'Dirgen', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ANAPRE', 'Anapre', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ANAPER', 'Anaper', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ANAADM', 'Anaadm', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('EDOEMP', 'Edoemp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ENCABEZADO', 'Encabezado', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 