<?php



class CcbenefiMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcbenefiMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccbenefi');
		$tMap->setPhpName('Ccbenefi');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccbenefi_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('NOMBEN', 'Nomben', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('SEXREP', 'Sexrep', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECNAC', 'Fecnac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMASO', 'Numaso', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NUMHOM', 'Numhom', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NUMMUJ', 'Nummuj', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NUMREGSUN', 'Numregsun', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('EMPACTMUJ', 'Empactmuj', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('EMPACTHOM', 'Empacthom', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CAPSOC', 'Capsoc', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CAPCON', 'Capcon', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('FECCON', 'Feccon', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DURACI', 'Duraci', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('DIRNOMURB', 'Dirnomurb', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRCALLES', 'Dircalles', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRCASEDI', 'Dircasedi', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRNUMPIS', 'Dirnumpis', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRAPATAR', 'Dirapatar', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRPUNREF', 'Dirpunref', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TELBEN', 'Telben', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CELBEN', 'Celben', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('FAXBEN', 'Faxben', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CODARETEL', 'Codaretel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODARECEL', 'Codarecel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODAREFAX', 'Codarefax', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CORELE', 'Corele', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CREANT', 'Creant', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('PROELA', 'Proela', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('MATPRI', 'Matpri', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('DISSISVEN', 'Dissisven', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('INGRES', 'Ingres', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ESPACTECO', 'Espacteco', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('OCUPA', 'Ocupa', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PROFE', 'Profe', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NUMNOM', 'Numnom', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECING', 'Fecing', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('EXTEN', 'Exten', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('INGMEN', 'Ingmen', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('OTROING', 'Otroing', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('DETOTROING', 'Detotroing', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addForeignKey('CCPERPRE_ID', 'CcperpreId', 'int', CreoleTypes::INTEGER, 'ccperpre', 'ID', true, null);

		$tMap->addForeignKey('CCESTCIV_ID', 'CcestcivId', 'int', CreoleTypes::INTEGER, 'ccestciv', 'ID', false, null);

		$tMap->addForeignKey('CCTIPUPS_ID', 'CctipupsId', 'int', CreoleTypes::INTEGER, 'cctipups', 'ID', true, null);

		$tMap->addForeignKey('CCPARROQ_ID', 'CcparroqId', 'int', CreoleTypes::INTEGER, 'ccparroq', 'ID', false, null);

		$tMap->addForeignKey('CCSECECO_ID', 'CcsececoId', 'int', CreoleTypes::INTEGER, 'ccsececo', 'ID', false, null);

		$tMap->addForeignKey('CCACTECO_ID', 'CcactecoId', 'int', CreoleTypes::INTEGER, 'ccacteco', 'ID', false, null);

		$tMap->addForeignKey('CCORIMATPRI_ID', 'CcorimatpriId', 'int', CreoleTypes::INTEGER, 'ccorimatpri', 'ID', false, null);

		$tMap->addForeignKey('CCCARGO_ID', 'CccargoId', 'int', CreoleTypes::INTEGER, 'cccargo', 'ID', false, null);

		$tMap->addForeignKey('CCCONDIC_ID', 'CccondicId', 'int', CreoleTypes::INTEGER, 'cccondic', 'ID', true, null);

		$tMap->addForeignKey('CCUBIADM_ID', 'CcubiadmId', 'int', CreoleTypes::INTEGER, 'ccubiadm', 'ID', false, null);

		$tMap->addForeignKey('CCCIUDAD_ID', 'CcciudadId', 'int', CreoleTypes::INTEGER, 'ccciudad', 'ID', true, null);

	} 
} 