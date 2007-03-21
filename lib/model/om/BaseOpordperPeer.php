<?php


abstract class BaseOpordperPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'opordper';

	
	const CLASS_DEFAULT = 'lib.model.Opordper';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFOPP = 'opordper.REFOPP';

	
	const DESOPP = 'opordper.DESOPP';

	
	const FECEMI = 'opordper.FECEMI';

	
	const NUMCUO = 'opordper.NUMCUO';

	
	const FREOPP = 'opordper.FREOPP';

	
	const CEDRIF = 'opordper.CEDRIF';

	
	const MONOPP = 'opordper.MONOPP';

	
	const STAORD = 'opordper.STAORD';

	
	const NUMCUE = 'opordper.NUMCUE';

	
	const CTABAN = 'opordper.CTABAN';

	
	const TIPDOC = 'opordper.TIPDOC';

	
	const REFERE = 'opordper.REFERE';

	
	const CODUNI = 'opordper.CODUNI';

	
	const TIPPAG = 'opordper.TIPPAG';

	
	const NUMTIQ = 'opordper.NUMTIQ';

	
	const PERAUT = 'opordper.PERAUT';

	
	const CEDAUT = 'opordper.CEDAUT';

	
	const ID = 'opordper.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refopp', 'Desopp', 'Fecemi', 'Numcuo', 'Freopp', 'Cedrif', 'Monopp', 'Staord', 'Numcue', 'Ctaban', 'Tipdoc', 'Refere', 'Coduni', 'Tippag', 'Numtiq', 'Peraut', 'Cedaut', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OpordperPeer::REFOPP, OpordperPeer::DESOPP, OpordperPeer::FECEMI, OpordperPeer::NUMCUO, OpordperPeer::FREOPP, OpordperPeer::CEDRIF, OpordperPeer::MONOPP, OpordperPeer::STAORD, OpordperPeer::NUMCUE, OpordperPeer::CTABAN, OpordperPeer::TIPDOC, OpordperPeer::REFERE, OpordperPeer::CODUNI, OpordperPeer::TIPPAG, OpordperPeer::NUMTIQ, OpordperPeer::PERAUT, OpordperPeer::CEDAUT, OpordperPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refopp', 'desopp', 'fecemi', 'numcuo', 'freopp', 'cedrif', 'monopp', 'staord', 'numcue', 'ctaban', 'tipdoc', 'refere', 'coduni', 'tippag', 'numtiq', 'peraut', 'cedaut', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refopp' => 0, 'Desopp' => 1, 'Fecemi' => 2, 'Numcuo' => 3, 'Freopp' => 4, 'Cedrif' => 5, 'Monopp' => 6, 'Staord' => 7, 'Numcue' => 8, 'Ctaban' => 9, 'Tipdoc' => 10, 'Refere' => 11, 'Coduni' => 12, 'Tippag' => 13, 'Numtiq' => 14, 'Peraut' => 15, 'Cedaut' => 16, 'Id' => 17, ),
		BasePeer::TYPE_COLNAME => array (OpordperPeer::REFOPP => 0, OpordperPeer::DESOPP => 1, OpordperPeer::FECEMI => 2, OpordperPeer::NUMCUO => 3, OpordperPeer::FREOPP => 4, OpordperPeer::CEDRIF => 5, OpordperPeer::MONOPP => 6, OpordperPeer::STAORD => 7, OpordperPeer::NUMCUE => 8, OpordperPeer::CTABAN => 9, OpordperPeer::TIPDOC => 10, OpordperPeer::REFERE => 11, OpordperPeer::CODUNI => 12, OpordperPeer::TIPPAG => 13, OpordperPeer::NUMTIQ => 14, OpordperPeer::PERAUT => 15, OpordperPeer::CEDAUT => 16, OpordperPeer::ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('refopp' => 0, 'desopp' => 1, 'fecemi' => 2, 'numcuo' => 3, 'freopp' => 4, 'cedrif' => 5, 'monopp' => 6, 'staord' => 7, 'numcue' => 8, 'ctaban' => 9, 'tipdoc' => 10, 'refere' => 11, 'coduni' => 12, 'tippag' => 13, 'numtiq' => 14, 'peraut' => 15, 'cedaut' => 16, 'id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OpordperMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OpordperMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OpordperPeer::getTableMap();
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
		return str_replace(OpordperPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OpordperPeer::REFOPP);

		$criteria->addSelectColumn(OpordperPeer::DESOPP);

		$criteria->addSelectColumn(OpordperPeer::FECEMI);

		$criteria->addSelectColumn(OpordperPeer::NUMCUO);

		$criteria->addSelectColumn(OpordperPeer::FREOPP);

		$criteria->addSelectColumn(OpordperPeer::CEDRIF);

		$criteria->addSelectColumn(OpordperPeer::MONOPP);

		$criteria->addSelectColumn(OpordperPeer::STAORD);

		$criteria->addSelectColumn(OpordperPeer::NUMCUE);

		$criteria->addSelectColumn(OpordperPeer::CTABAN);

		$criteria->addSelectColumn(OpordperPeer::TIPDOC);

		$criteria->addSelectColumn(OpordperPeer::REFERE);

		$criteria->addSelectColumn(OpordperPeer::CODUNI);

		$criteria->addSelectColumn(OpordperPeer::TIPPAG);

		$criteria->addSelectColumn(OpordperPeer::NUMTIQ);

		$criteria->addSelectColumn(OpordperPeer::PERAUT);

		$criteria->addSelectColumn(OpordperPeer::CEDAUT);

		$criteria->addSelectColumn(OpordperPeer::ID);

	}

	const COUNT = 'COUNT(opordper.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT opordper.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OpordperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OpordperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OpordperPeer::doSelectRS($criteria, $con);
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
		$objects = OpordperPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OpordperPeer::populateObjects(OpordperPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OpordperPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OpordperPeer::getOMClass();
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
		return OpordperPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(OpordperPeer::ID);
			$selectCriteria->add(OpordperPeer::ID, $criteria->remove(OpordperPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OpordperPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OpordperPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Opordper) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OpordperPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Opordper $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OpordperPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OpordperPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OpordperPeer::DATABASE_NAME, OpordperPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OpordperPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OpordperPeer::DATABASE_NAME);

		$criteria->add(OpordperPeer::ID, $pk);


		$v = OpordperPeer::doSelect($criteria, $con);

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
			$criteria->add(OpordperPeer::ID, $pks, Criteria::IN);
			$objs = OpordperPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOpordperPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OpordperMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OpordperMapBuilder');
}
