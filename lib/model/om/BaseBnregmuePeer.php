<?php


abstract class BaseBnregmuePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'bnregmue';

	
	const CLASS_DEFAULT = 'lib.model.Bnregmue';

	
	const NUM_COLUMNS = 53;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODACT = 'bnregmue.CODACT';

	
	const CODMUE = 'bnregmue.CODMUE';

	
	const DESMUE = 'bnregmue.DESMUE';

	
	const CODPRO = 'bnregmue.CODPRO';

	
	const ORDCOM = 'bnregmue.ORDCOM';

	
	const FECREG = 'bnregmue.FECREG';

	
	const FECCOM = 'bnregmue.FECCOM';

	
	const FECDEP = 'bnregmue.FECDEP';

	
	const FECAJU = 'bnregmue.FECAJU';

	
	const FECACT = 'bnregmue.FECACT';

	
	const FECEXP = 'bnregmue.FECEXP';

	
	const ORDRCP = 'bnregmue.ORDRCP';

	
	const FOTMUE = 'bnregmue.FOTMUE';

	
	const MARMUE = 'bnregmue.MARMUE';

	
	const MODMUE = 'bnregmue.MODMUE';

	
	const ANOMUE = 'bnregmue.ANOMUE';

	
	const COLMUE = 'bnregmue.COLMUE';

	
	const CODUBI = 'bnregmue.CODUBI';

	
	const PESMUE = 'bnregmue.PESMUE';

	
	const CAPMUE = 'bnregmue.CAPMUE';

	
	const TIPMUE = 'bnregmue.TIPMUE';

	
	const VIDUTI = 'bnregmue.VIDUTI';

	
	const LNGMUE = 'bnregmue.LNGMUE';

	
	const NROPIE = 'bnregmue.NROPIE';

	
	const SERMUE = 'bnregmue.SERMUE';

	
	const USOMUE = 'bnregmue.USOMUE';

	
	const ALTMUE = 'bnregmue.ALTMUE';

	
	const LARMUE = 'bnregmue.LARMUE';

	
	const ANCMUE = 'bnregmue.ANCMUE';

	
	const CODDIS = 'bnregmue.CODDIS';

	
	const DETMUE = 'bnregmue.DETMUE';

	
	const EDOMUE = 'bnregmue.EDOMUE';

	
	const MUNMUE = 'bnregmue.MUNMUE';

	
	const DEPMUE = 'bnregmue.DEPMUE';

	
	const DIRMUE = 'bnregmue.DIRMUE';

	
	const UBIMUE = 'bnregmue.UBIMUE';

	
	const MESDEP = 'bnregmue.MESDEP';

	
	const VALINI = 'bnregmue.VALINI';

	
	const VALRES = 'bnregmue.VALRES';

	
	const VALLIB = 'bnregmue.VALLIB';

	
	const VALREX = 'bnregmue.VALREX';

	
	const COSREP = 'bnregmue.COSREP';

	
	const DEPMEN = 'bnregmue.DEPMEN';

	
	const DEPACU = 'bnregmue.DEPACU';

	
	const STAMUE = 'bnregmue.STAMUE';

	
	const CODALT = 'bnregmue.CODALT';

	
	const FECRCP = 'bnregmue.FECRCP';

	
	const VALADI = 'bnregmue.VALADI';

	
	const AUMVIDUTI = 'bnregmue.AUMVIDUTI';

	
	const DIMVIDUTI = 'bnregmue.DIMVIDUTI';

	
	const STASEM = 'bnregmue.STASEM';

	
	const STAINM = 'bnregmue.STAINM';

	
	const ID = 'bnregmue.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codact', 'Codmue', 'Desmue', 'Codpro', 'Ordcom', 'Fecreg', 'Feccom', 'Fecdep', 'Fecaju', 'Fecact', 'Fecexp', 'Ordrcp', 'Fotmue', 'Marmue', 'Modmue', 'Anomue', 'Colmue', 'Codubi', 'Pesmue', 'Capmue', 'Tipmue', 'Viduti', 'Lngmue', 'Nropie', 'Sermue', 'Usomue', 'Altmue', 'Larmue', 'Ancmue', 'Coddis', 'Detmue', 'Edomue', 'Munmue', 'Depmue', 'Dirmue', 'Ubimue', 'Mesdep', 'Valini', 'Valres', 'Vallib', 'Valrex', 'Cosrep', 'Depmen', 'Depacu', 'Stamue', 'Codalt', 'Fecrcp', 'Valadi', 'Aumviduti', 'Dimviduti', 'Stasem', 'Stainm', 'Id', ),
		BasePeer::TYPE_COLNAME => array (BnregmuePeer::CODACT, BnregmuePeer::CODMUE, BnregmuePeer::DESMUE, BnregmuePeer::CODPRO, BnregmuePeer::ORDCOM, BnregmuePeer::FECREG, BnregmuePeer::FECCOM, BnregmuePeer::FECDEP, BnregmuePeer::FECAJU, BnregmuePeer::FECACT, BnregmuePeer::FECEXP, BnregmuePeer::ORDRCP, BnregmuePeer::FOTMUE, BnregmuePeer::MARMUE, BnregmuePeer::MODMUE, BnregmuePeer::ANOMUE, BnregmuePeer::COLMUE, BnregmuePeer::CODUBI, BnregmuePeer::PESMUE, BnregmuePeer::CAPMUE, BnregmuePeer::TIPMUE, BnregmuePeer::VIDUTI, BnregmuePeer::LNGMUE, BnregmuePeer::NROPIE, BnregmuePeer::SERMUE, BnregmuePeer::USOMUE, BnregmuePeer::ALTMUE, BnregmuePeer::LARMUE, BnregmuePeer::ANCMUE, BnregmuePeer::CODDIS, BnregmuePeer::DETMUE, BnregmuePeer::EDOMUE, BnregmuePeer::MUNMUE, BnregmuePeer::DEPMUE, BnregmuePeer::DIRMUE, BnregmuePeer::UBIMUE, BnregmuePeer::MESDEP, BnregmuePeer::VALINI, BnregmuePeer::VALRES, BnregmuePeer::VALLIB, BnregmuePeer::VALREX, BnregmuePeer::COSREP, BnregmuePeer::DEPMEN, BnregmuePeer::DEPACU, BnregmuePeer::STAMUE, BnregmuePeer::CODALT, BnregmuePeer::FECRCP, BnregmuePeer::VALADI, BnregmuePeer::AUMVIDUTI, BnregmuePeer::DIMVIDUTI, BnregmuePeer::STASEM, BnregmuePeer::STAINM, BnregmuePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codact', 'codmue', 'desmue', 'codpro', 'ordcom', 'fecreg', 'feccom', 'fecdep', 'fecaju', 'fecact', 'fecexp', 'ordrcp', 'fotmue', 'marmue', 'modmue', 'anomue', 'colmue', 'codubi', 'pesmue', 'capmue', 'tipmue', 'viduti', 'lngmue', 'nropie', 'sermue', 'usomue', 'altmue', 'larmue', 'ancmue', 'coddis', 'detmue', 'edomue', 'munmue', 'depmue', 'dirmue', 'ubimue', 'mesdep', 'valini', 'valres', 'vallib', 'valrex', 'cosrep', 'depmen', 'depacu', 'stamue', 'codalt', 'fecrcp', 'valadi', 'aumviduti', 'dimviduti', 'stasem', 'stainm', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codact' => 0, 'Codmue' => 1, 'Desmue' => 2, 'Codpro' => 3, 'Ordcom' => 4, 'Fecreg' => 5, 'Feccom' => 6, 'Fecdep' => 7, 'Fecaju' => 8, 'Fecact' => 9, 'Fecexp' => 10, 'Ordrcp' => 11, 'Fotmue' => 12, 'Marmue' => 13, 'Modmue' => 14, 'Anomue' => 15, 'Colmue' => 16, 'Codubi' => 17, 'Pesmue' => 18, 'Capmue' => 19, 'Tipmue' => 20, 'Viduti' => 21, 'Lngmue' => 22, 'Nropie' => 23, 'Sermue' => 24, 'Usomue' => 25, 'Altmue' => 26, 'Larmue' => 27, 'Ancmue' => 28, 'Coddis' => 29, 'Detmue' => 30, 'Edomue' => 31, 'Munmue' => 32, 'Depmue' => 33, 'Dirmue' => 34, 'Ubimue' => 35, 'Mesdep' => 36, 'Valini' => 37, 'Valres' => 38, 'Vallib' => 39, 'Valrex' => 40, 'Cosrep' => 41, 'Depmen' => 42, 'Depacu' => 43, 'Stamue' => 44, 'Codalt' => 45, 'Fecrcp' => 46, 'Valadi' => 47, 'Aumviduti' => 48, 'Dimviduti' => 49, 'Stasem' => 50, 'Stainm' => 51, 'Id' => 52, ),
		BasePeer::TYPE_COLNAME => array (BnregmuePeer::CODACT => 0, BnregmuePeer::CODMUE => 1, BnregmuePeer::DESMUE => 2, BnregmuePeer::CODPRO => 3, BnregmuePeer::ORDCOM => 4, BnregmuePeer::FECREG => 5, BnregmuePeer::FECCOM => 6, BnregmuePeer::FECDEP => 7, BnregmuePeer::FECAJU => 8, BnregmuePeer::FECACT => 9, BnregmuePeer::FECEXP => 10, BnregmuePeer::ORDRCP => 11, BnregmuePeer::FOTMUE => 12, BnregmuePeer::MARMUE => 13, BnregmuePeer::MODMUE => 14, BnregmuePeer::ANOMUE => 15, BnregmuePeer::COLMUE => 16, BnregmuePeer::CODUBI => 17, BnregmuePeer::PESMUE => 18, BnregmuePeer::CAPMUE => 19, BnregmuePeer::TIPMUE => 20, BnregmuePeer::VIDUTI => 21, BnregmuePeer::LNGMUE => 22, BnregmuePeer::NROPIE => 23, BnregmuePeer::SERMUE => 24, BnregmuePeer::USOMUE => 25, BnregmuePeer::ALTMUE => 26, BnregmuePeer::LARMUE => 27, BnregmuePeer::ANCMUE => 28, BnregmuePeer::CODDIS => 29, BnregmuePeer::DETMUE => 30, BnregmuePeer::EDOMUE => 31, BnregmuePeer::MUNMUE => 32, BnregmuePeer::DEPMUE => 33, BnregmuePeer::DIRMUE => 34, BnregmuePeer::UBIMUE => 35, BnregmuePeer::MESDEP => 36, BnregmuePeer::VALINI => 37, BnregmuePeer::VALRES => 38, BnregmuePeer::VALLIB => 39, BnregmuePeer::VALREX => 40, BnregmuePeer::COSREP => 41, BnregmuePeer::DEPMEN => 42, BnregmuePeer::DEPACU => 43, BnregmuePeer::STAMUE => 44, BnregmuePeer::CODALT => 45, BnregmuePeer::FECRCP => 46, BnregmuePeer::VALADI => 47, BnregmuePeer::AUMVIDUTI => 48, BnregmuePeer::DIMVIDUTI => 49, BnregmuePeer::STASEM => 50, BnregmuePeer::STAINM => 51, BnregmuePeer::ID => 52, ),
		BasePeer::TYPE_FIELDNAME => array ('codact' => 0, 'codmue' => 1, 'desmue' => 2, 'codpro' => 3, 'ordcom' => 4, 'fecreg' => 5, 'feccom' => 6, 'fecdep' => 7, 'fecaju' => 8, 'fecact' => 9, 'fecexp' => 10, 'ordrcp' => 11, 'fotmue' => 12, 'marmue' => 13, 'modmue' => 14, 'anomue' => 15, 'colmue' => 16, 'codubi' => 17, 'pesmue' => 18, 'capmue' => 19, 'tipmue' => 20, 'viduti' => 21, 'lngmue' => 22, 'nropie' => 23, 'sermue' => 24, 'usomue' => 25, 'altmue' => 26, 'larmue' => 27, 'ancmue' => 28, 'coddis' => 29, 'detmue' => 30, 'edomue' => 31, 'munmue' => 32, 'depmue' => 33, 'dirmue' => 34, 'ubimue' => 35, 'mesdep' => 36, 'valini' => 37, 'valres' => 38, 'vallib' => 39, 'valrex' => 40, 'cosrep' => 41, 'depmen' => 42, 'depacu' => 43, 'stamue' => 44, 'codalt' => 45, 'fecrcp' => 46, 'valadi' => 47, 'aumviduti' => 48, 'dimviduti' => 49, 'stasem' => 50, 'stainm' => 51, 'id' => 52, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BnregmueMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BnregmueMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BnregmuePeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(BnregmuePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BnregmuePeer::CODACT);

		$criteria->addSelectColumn(BnregmuePeer::CODMUE);

		$criteria->addSelectColumn(BnregmuePeer::DESMUE);

		$criteria->addSelectColumn(BnregmuePeer::CODPRO);

		$criteria->addSelectColumn(BnregmuePeer::ORDCOM);

		$criteria->addSelectColumn(BnregmuePeer::FECREG);

		$criteria->addSelectColumn(BnregmuePeer::FECCOM);

		$criteria->addSelectColumn(BnregmuePeer::FECDEP);

		$criteria->addSelectColumn(BnregmuePeer::FECAJU);

		$criteria->addSelectColumn(BnregmuePeer::FECACT);

		$criteria->addSelectColumn(BnregmuePeer::FECEXP);

		$criteria->addSelectColumn(BnregmuePeer::ORDRCP);

		$criteria->addSelectColumn(BnregmuePeer::FOTMUE);

		$criteria->addSelectColumn(BnregmuePeer::MARMUE);

		$criteria->addSelectColumn(BnregmuePeer::MODMUE);

		$criteria->addSelectColumn(BnregmuePeer::ANOMUE);

		$criteria->addSelectColumn(BnregmuePeer::COLMUE);

		$criteria->addSelectColumn(BnregmuePeer::CODUBI);

		$criteria->addSelectColumn(BnregmuePeer::PESMUE);

		$criteria->addSelectColumn(BnregmuePeer::CAPMUE);

		$criteria->addSelectColumn(BnregmuePeer::TIPMUE);

		$criteria->addSelectColumn(BnregmuePeer::VIDUTI);

		$criteria->addSelectColumn(BnregmuePeer::LNGMUE);

		$criteria->addSelectColumn(BnregmuePeer::NROPIE);

		$criteria->addSelectColumn(BnregmuePeer::SERMUE);

		$criteria->addSelectColumn(BnregmuePeer::USOMUE);

		$criteria->addSelectColumn(BnregmuePeer::ALTMUE);

		$criteria->addSelectColumn(BnregmuePeer::LARMUE);

		$criteria->addSelectColumn(BnregmuePeer::ANCMUE);

		$criteria->addSelectColumn(BnregmuePeer::CODDIS);

		$criteria->addSelectColumn(BnregmuePeer::DETMUE);

		$criteria->addSelectColumn(BnregmuePeer::EDOMUE);

		$criteria->addSelectColumn(BnregmuePeer::MUNMUE);

		$criteria->addSelectColumn(BnregmuePeer::DEPMUE);

		$criteria->addSelectColumn(BnregmuePeer::DIRMUE);

		$criteria->addSelectColumn(BnregmuePeer::UBIMUE);

		$criteria->addSelectColumn(BnregmuePeer::MESDEP);

		$criteria->addSelectColumn(BnregmuePeer::VALINI);

		$criteria->addSelectColumn(BnregmuePeer::VALRES);

		$criteria->addSelectColumn(BnregmuePeer::VALLIB);

		$criteria->addSelectColumn(BnregmuePeer::VALREX);

		$criteria->addSelectColumn(BnregmuePeer::COSREP);

		$criteria->addSelectColumn(BnregmuePeer::DEPMEN);

		$criteria->addSelectColumn(BnregmuePeer::DEPACU);

		$criteria->addSelectColumn(BnregmuePeer::STAMUE);

		$criteria->addSelectColumn(BnregmuePeer::CODALT);

		$criteria->addSelectColumn(BnregmuePeer::FECRCP);

		$criteria->addSelectColumn(BnregmuePeer::VALADI);

		$criteria->addSelectColumn(BnregmuePeer::AUMVIDUTI);

		$criteria->addSelectColumn(BnregmuePeer::DIMVIDUTI);

		$criteria->addSelectColumn(BnregmuePeer::STASEM);

		$criteria->addSelectColumn(BnregmuePeer::STAINM);

		$criteria->addSelectColumn(BnregmuePeer::ID);

	}

	const COUNT = 'COUNT(bnregmue.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT bnregmue.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BnregmuePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BnregmuePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BnregmuePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = BnregmuePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BnregmuePeer::populateObjects(BnregmuePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BnregmuePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BnregmuePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return BnregmuePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(BnregmuePeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(BnregmuePeer::ID);
			$selectCriteria->add(BnregmuePeer::ID, $criteria->remove(BnregmuePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(BnregmuePeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(BnregmuePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Bnregmue) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BnregmuePeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Bnregmue $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BnregmuePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BnregmuePeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(BnregmuePeer::DATABASE_NAME, BnregmuePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BnregmuePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(BnregmuePeer::DATABASE_NAME);

		$criteria->add(BnregmuePeer::ID, $pk);


		$v = BnregmuePeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(BnregmuePeer::ID, $pks, Criteria::IN);
			$objs = BnregmuePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBnregmuePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BnregmueMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BnregmueMapBuilder');
}
