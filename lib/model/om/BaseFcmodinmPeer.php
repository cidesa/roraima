<?php


abstract class BaseFcmodinmPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcmodinm';

	
	const CLASS_DEFAULT = 'lib.model.Fcmodinm';

	
	const NUM_COLUMNS = 38;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFMOD = 'fcmodinm.REFMOD';

	
	const NROINM = 'fcmodinm.NROINM';

	
	const FECMOD = 'fcmodinm.FECMOD';

	
	const CODCATFIS = 'fcmodinm.CODCATFIS';

	
	const CODUSO = 'fcmodinm.CODUSO';

	
	const CODCARINM = 'fcmodinm.CODCARINM';

	
	const CODSITINM = 'fcmodinm.CODSITINM';

	
	const FECPAG = 'fcmodinm.FECPAG';

	
	const FECCAL = 'fcmodinm.FECCAL';

	
	const DIRINM = 'fcmodinm.DIRINM';

	
	const LINNOR = 'fcmodinm.LINNOR';

	
	const LINSUR = 'fcmodinm.LINSUR';

	
	const LINEST = 'fcmodinm.LINEST';

	
	const LINOES = 'fcmodinm.LINOES';

	
	const MTRTER = 'fcmodinm.MTRTER';

	
	const MTRCON = 'fcmodinm.MTRCON';

	
	const BSTER = 'fcmodinm.BSTER';

	
	const BSCON = 'fcmodinm.BSCON';

	
	const DOCPRO = 'fcmodinm.DOCPRO';

	
	const CODCATFISANT = 'fcmodinm.CODCATFISANT';

	
	const CODUSOANT = 'fcmodinm.CODUSOANT';

	
	const CODCARINMANT = 'fcmodinm.CODCARINMANT';

	
	const CODSITINMANT = 'fcmodinm.CODSITINMANT';

	
	const FECPAGANT = 'fcmodinm.FECPAGANT';

	
	const FECCALANT = 'fcmodinm.FECCALANT';

	
	const DIRINMANT = 'fcmodinm.DIRINMANT';

	
	const LINNORANT = 'fcmodinm.LINNORANT';

	
	const LINSURANT = 'fcmodinm.LINSURANT';

	
	const LINESTANT = 'fcmodinm.LINESTANT';

	
	const LINOESANT = 'fcmodinm.LINOESANT';

	
	const MTRTERANT = 'fcmodinm.MTRTERANT';

	
	const MTRCONANT = 'fcmodinm.MTRCONANT';

	
	const BSTERANT = 'fcmodinm.BSTERANT';

	
	const BSCONANT = 'fcmodinm.BSCONANT';

	
	const DOCPROANT = 'fcmodinm.DOCPROANT';

	
	const FUNREC = 'fcmodinm.FUNREC';

	
	const CODCATINM = 'fcmodinm.CODCATINM';

	
	const ID = 'fcmodinm.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refmod', 'Nroinm', 'Fecmod', 'Codcatfis', 'Coduso', 'Codcarinm', 'Codsitinm', 'Fecpag', 'Feccal', 'Dirinm', 'Linnor', 'Linsur', 'Linest', 'Linoes', 'Mtrter', 'Mtrcon', 'Bster', 'Bscon', 'Docpro', 'Codcatfisant', 'Codusoant', 'Codcarinmant', 'Codsitinmant', 'Fecpagant', 'Feccalant', 'Dirinmant', 'Linnorant', 'Linsurant', 'Linestant', 'Linoesant', 'Mtrterant', 'Mtrconant', 'Bsterant', 'Bsconant', 'Docproant', 'Funrec', 'Codcatinm', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcmodinmPeer::REFMOD, FcmodinmPeer::NROINM, FcmodinmPeer::FECMOD, FcmodinmPeer::CODCATFIS, FcmodinmPeer::CODUSO, FcmodinmPeer::CODCARINM, FcmodinmPeer::CODSITINM, FcmodinmPeer::FECPAG, FcmodinmPeer::FECCAL, FcmodinmPeer::DIRINM, FcmodinmPeer::LINNOR, FcmodinmPeer::LINSUR, FcmodinmPeer::LINEST, FcmodinmPeer::LINOES, FcmodinmPeer::MTRTER, FcmodinmPeer::MTRCON, FcmodinmPeer::BSTER, FcmodinmPeer::BSCON, FcmodinmPeer::DOCPRO, FcmodinmPeer::CODCATFISANT, FcmodinmPeer::CODUSOANT, FcmodinmPeer::CODCARINMANT, FcmodinmPeer::CODSITINMANT, FcmodinmPeer::FECPAGANT, FcmodinmPeer::FECCALANT, FcmodinmPeer::DIRINMANT, FcmodinmPeer::LINNORANT, FcmodinmPeer::LINSURANT, FcmodinmPeer::LINESTANT, FcmodinmPeer::LINOESANT, FcmodinmPeer::MTRTERANT, FcmodinmPeer::MTRCONANT, FcmodinmPeer::BSTERANT, FcmodinmPeer::BSCONANT, FcmodinmPeer::DOCPROANT, FcmodinmPeer::FUNREC, FcmodinmPeer::CODCATINM, FcmodinmPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refmod', 'nroinm', 'fecmod', 'codcatfis', 'coduso', 'codcarinm', 'codsitinm', 'fecpag', 'feccal', 'dirinm', 'linnor', 'linsur', 'linest', 'linoes', 'mtrter', 'mtrcon', 'bster', 'bscon', 'docpro', 'codcatfisant', 'codusoant', 'codcarinmant', 'codsitinmant', 'fecpagant', 'feccalant', 'dirinmant', 'linnorant', 'linsurant', 'linestant', 'linoesant', 'mtrterant', 'mtrconant', 'bsterant', 'bsconant', 'docproant', 'funrec', 'codcatinm', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refmod' => 0, 'Nroinm' => 1, 'Fecmod' => 2, 'Codcatfis' => 3, 'Coduso' => 4, 'Codcarinm' => 5, 'Codsitinm' => 6, 'Fecpag' => 7, 'Feccal' => 8, 'Dirinm' => 9, 'Linnor' => 10, 'Linsur' => 11, 'Linest' => 12, 'Linoes' => 13, 'Mtrter' => 14, 'Mtrcon' => 15, 'Bster' => 16, 'Bscon' => 17, 'Docpro' => 18, 'Codcatfisant' => 19, 'Codusoant' => 20, 'Codcarinmant' => 21, 'Codsitinmant' => 22, 'Fecpagant' => 23, 'Feccalant' => 24, 'Dirinmant' => 25, 'Linnorant' => 26, 'Linsurant' => 27, 'Linestant' => 28, 'Linoesant' => 29, 'Mtrterant' => 30, 'Mtrconant' => 31, 'Bsterant' => 32, 'Bsconant' => 33, 'Docproant' => 34, 'Funrec' => 35, 'Codcatinm' => 36, 'Id' => 37, ),
		BasePeer::TYPE_COLNAME => array (FcmodinmPeer::REFMOD => 0, FcmodinmPeer::NROINM => 1, FcmodinmPeer::FECMOD => 2, FcmodinmPeer::CODCATFIS => 3, FcmodinmPeer::CODUSO => 4, FcmodinmPeer::CODCARINM => 5, FcmodinmPeer::CODSITINM => 6, FcmodinmPeer::FECPAG => 7, FcmodinmPeer::FECCAL => 8, FcmodinmPeer::DIRINM => 9, FcmodinmPeer::LINNOR => 10, FcmodinmPeer::LINSUR => 11, FcmodinmPeer::LINEST => 12, FcmodinmPeer::LINOES => 13, FcmodinmPeer::MTRTER => 14, FcmodinmPeer::MTRCON => 15, FcmodinmPeer::BSTER => 16, FcmodinmPeer::BSCON => 17, FcmodinmPeer::DOCPRO => 18, FcmodinmPeer::CODCATFISANT => 19, FcmodinmPeer::CODUSOANT => 20, FcmodinmPeer::CODCARINMANT => 21, FcmodinmPeer::CODSITINMANT => 22, FcmodinmPeer::FECPAGANT => 23, FcmodinmPeer::FECCALANT => 24, FcmodinmPeer::DIRINMANT => 25, FcmodinmPeer::LINNORANT => 26, FcmodinmPeer::LINSURANT => 27, FcmodinmPeer::LINESTANT => 28, FcmodinmPeer::LINOESANT => 29, FcmodinmPeer::MTRTERANT => 30, FcmodinmPeer::MTRCONANT => 31, FcmodinmPeer::BSTERANT => 32, FcmodinmPeer::BSCONANT => 33, FcmodinmPeer::DOCPROANT => 34, FcmodinmPeer::FUNREC => 35, FcmodinmPeer::CODCATINM => 36, FcmodinmPeer::ID => 37, ),
		BasePeer::TYPE_FIELDNAME => array ('refmod' => 0, 'nroinm' => 1, 'fecmod' => 2, 'codcatfis' => 3, 'coduso' => 4, 'codcarinm' => 5, 'codsitinm' => 6, 'fecpag' => 7, 'feccal' => 8, 'dirinm' => 9, 'linnor' => 10, 'linsur' => 11, 'linest' => 12, 'linoes' => 13, 'mtrter' => 14, 'mtrcon' => 15, 'bster' => 16, 'bscon' => 17, 'docpro' => 18, 'codcatfisant' => 19, 'codusoant' => 20, 'codcarinmant' => 21, 'codsitinmant' => 22, 'fecpagant' => 23, 'feccalant' => 24, 'dirinmant' => 25, 'linnorant' => 26, 'linsurant' => 27, 'linestant' => 28, 'linoesant' => 29, 'mtrterant' => 30, 'mtrconant' => 31, 'bsterant' => 32, 'bsconant' => 33, 'docproant' => 34, 'funrec' => 35, 'codcatinm' => 36, 'id' => 37, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcmodinmMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcmodinmMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcmodinmPeer::getTableMap();
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
		return str_replace(FcmodinmPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcmodinmPeer::REFMOD);

		$criteria->addSelectColumn(FcmodinmPeer::NROINM);

		$criteria->addSelectColumn(FcmodinmPeer::FECMOD);

		$criteria->addSelectColumn(FcmodinmPeer::CODCATFIS);

		$criteria->addSelectColumn(FcmodinmPeer::CODUSO);

		$criteria->addSelectColumn(FcmodinmPeer::CODCARINM);

		$criteria->addSelectColumn(FcmodinmPeer::CODSITINM);

		$criteria->addSelectColumn(FcmodinmPeer::FECPAG);

		$criteria->addSelectColumn(FcmodinmPeer::FECCAL);

		$criteria->addSelectColumn(FcmodinmPeer::DIRINM);

		$criteria->addSelectColumn(FcmodinmPeer::LINNOR);

		$criteria->addSelectColumn(FcmodinmPeer::LINSUR);

		$criteria->addSelectColumn(FcmodinmPeer::LINEST);

		$criteria->addSelectColumn(FcmodinmPeer::LINOES);

		$criteria->addSelectColumn(FcmodinmPeer::MTRTER);

		$criteria->addSelectColumn(FcmodinmPeer::MTRCON);

		$criteria->addSelectColumn(FcmodinmPeer::BSTER);

		$criteria->addSelectColumn(FcmodinmPeer::BSCON);

		$criteria->addSelectColumn(FcmodinmPeer::DOCPRO);

		$criteria->addSelectColumn(FcmodinmPeer::CODCATFISANT);

		$criteria->addSelectColumn(FcmodinmPeer::CODUSOANT);

		$criteria->addSelectColumn(FcmodinmPeer::CODCARINMANT);

		$criteria->addSelectColumn(FcmodinmPeer::CODSITINMANT);

		$criteria->addSelectColumn(FcmodinmPeer::FECPAGANT);

		$criteria->addSelectColumn(FcmodinmPeer::FECCALANT);

		$criteria->addSelectColumn(FcmodinmPeer::DIRINMANT);

		$criteria->addSelectColumn(FcmodinmPeer::LINNORANT);

		$criteria->addSelectColumn(FcmodinmPeer::LINSURANT);

		$criteria->addSelectColumn(FcmodinmPeer::LINESTANT);

		$criteria->addSelectColumn(FcmodinmPeer::LINOESANT);

		$criteria->addSelectColumn(FcmodinmPeer::MTRTERANT);

		$criteria->addSelectColumn(FcmodinmPeer::MTRCONANT);

		$criteria->addSelectColumn(FcmodinmPeer::BSTERANT);

		$criteria->addSelectColumn(FcmodinmPeer::BSCONANT);

		$criteria->addSelectColumn(FcmodinmPeer::DOCPROANT);

		$criteria->addSelectColumn(FcmodinmPeer::FUNREC);

		$criteria->addSelectColumn(FcmodinmPeer::CODCATINM);

		$criteria->addSelectColumn(FcmodinmPeer::ID);

	}

	const COUNT = 'COUNT(fcmodinm.REFMOD)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcmodinm.REFMOD)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcmodinmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcmodinmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcmodinmPeer::doSelectRS($criteria, $con);
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
		$objects = FcmodinmPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcmodinmPeer::populateObjects(FcmodinmPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcmodinmPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcmodinmPeer::getOMClass();
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
		return FcmodinmPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


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
			$comparison = $criteria->getComparison(FcmodinmPeer::REFMOD);
			$selectCriteria->add(FcmodinmPeer::REFMOD, $criteria->remove(FcmodinmPeer::REFMOD), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcmodinmPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcmodinmPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcmodinm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcmodinmPeer::REFMOD, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcmodinm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcmodinmPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcmodinmPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcmodinmPeer::DATABASE_NAME, FcmodinmPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcmodinmPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcmodinmPeer::DATABASE_NAME);

		$criteria->add(FcmodinmPeer::REFMOD, $pk);


		$v = FcmodinmPeer::doSelect($criteria, $con);

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
			$criteria->add(FcmodinmPeer::REFMOD, $pks, Criteria::IN);
			$objs = FcmodinmPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcmodinmPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcmodinmMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcmodinmMapBuilder');
}
