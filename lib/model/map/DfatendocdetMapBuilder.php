<?php



class DfatendocdetMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DfatendocdetMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('dfatendocdet');
		$tMap->setPhpName('Dfatendocdet');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('dfatendocdet_SEQ');

		$tMap->addForeignKey('ID_DFATENDOC', 'IdDfatendoc', 'int', CreoleTypes::INTEGER, 'dfatendoc', 'ID', true, null);

		$tMap->addForeignKey('ID_USUARIO', 'IdUsuario', 'int', CreoleTypes::INTEGER, 'usuarios', 'ID', true, null);

		$tMap->addColumn('DESATE', 'Desate', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('FECATE', 'Fecate', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addForeignKey('ID_ACUNIDAD_ORI', 'IdAcunidadOri', 'int', CreoleTypes::INTEGER, 'acunidad', 'ID', true, null);

		$tMap->addForeignKey('ID_ACUNIDAD_DES', 'IdAcunidadDes', 'int', CreoleTypes::INTEGER, 'acunidad', 'ID', true, null);

		$tMap->addForeignKey('ID_DFRUTADOC', 'IdDfrutadoc', 'int', CreoleTypes::INTEGER, 'dfrutadoc', 'ID', true, null);

		$tMap->addForeignKey('ID_DFMEDTRA', 'IdDfmedtra', 'string', CreoleTypes::VARCHAR, 'dfmedtra', 'ID', false, null);

		$tMap->addColumn('DIAENT', 'Diaent', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TOTDIA', 'Totdia', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 