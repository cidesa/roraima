<?php


	
class FordefpryMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefpryMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fordefpry');
		$tMap->setPhpName('Fordefpry');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NOMPRO', 'Nompro', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('PROACC', 'Proacc', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODSTA', 'Codsta', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODSITPRE', 'Codsitpre', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CONPOA', 'Conpoa', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECCUL', 'Feccul', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('UBINAC', 'Ubinac', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODEQU', 'Codequ', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODSUBOBJ', 'Codsubobj', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODSUBSUBOBJ', 'Codsubsubobj', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('OBJESTNUEETA', 'Objestnueeta', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('OBJESTINS', 'Objestins', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('OBJEESPPRO', 'Objeesppro', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('INDPRO', 'Indpro', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('ENUPRO', 'Enupro', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('INDSITACT', 'Indsitact', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('FECULTDAT', 'Fecultdat', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FORIND', 'Forind', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('FUEIND', 'Fueind', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('INDSITOBJ', 'Indsitobj', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('TIEIMP', 'Tieimp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('RESPRO', 'Respro', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('DESMET', 'Desmet', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('CODUNIMEDMET', 'Codunimedmet', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CANTMET', 'Cantmet', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('BENPRO', 'Benpro', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODEJEDES', 'Codejedes', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODNUCDES', 'Codnucdes', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODZONECO', 'Codzoneco', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('COMINDUST', 'Comindust', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODSEC', 'Codsec', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODSUBSEC', 'Codsubsec', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('MONTOTPRY', 'Montotpry', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CAREMP', 'Caremp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('UNIADSEMP', 'Uniadsemp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELEMP', 'Telemp', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FAXEMP', 'Faxemp', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('EMAEMP', 'Emaemp', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ACCOTRINS', 'Accotrins', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('OBSACCOTRINS', 'Obsaccotrins', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CONPRYOTR', 'Conpryotr', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('OBSCONPRYOTR', 'Obsconpryotr', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CONOTRPRY', 'Conotrpry', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('OBSCONOTRPRY', 'Obsconotrpry', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('TIPACCAGE', 'Tipaccage', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PLACONTIN', 'Placontin', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('OBSPLACONTIN', 'Obsplacontin', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('NROEMPDIR', 'Nroempdir', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NROEMPIND', 'Nroempind', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DESBREPRY', 'Desbrepry', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('PORAVAFIS', 'Poravafis', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PORAVAFIN', 'Poravafin', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('UNIEJEPRI', 'Uniejepri', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('UBIGEO', 'Ubigeo', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('PLACTG', 'Plactg', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('CODDIR', 'Coddir', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('FACRZG', 'Facrzg', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('OBJPNDES', 'Objpndes', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('UNIMEDRES', 'Unimedres', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODPRG', 'Codprg', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 