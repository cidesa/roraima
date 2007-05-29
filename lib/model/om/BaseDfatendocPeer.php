<?php


abstract class BaseDfatendocPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dfatendoc';

	
	const CLASS_DEFAULT = 'lib.model.Dfatendoc';

	
	const NUM_COLUMNS = 21;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODIGO = 'dfatendoc.CODIGO';

	
	const LOGUSE = 'dfatendoc.LOGUSE';

	
	const ESTADO = 'dfatendoc.ESTADO';

	
	const FECREC = 'dfatendoc.FECREC';

	
	const HORREC = 'dfatendoc.HORREC';

	
	const FECATE = 'dfatendoc.FECATE';

	
	const HORATE = 'dfatendoc.HORATE';

	
	const NUMUNI = 'dfatendoc.NUMUNI';

	
	const NUMUNIORI = 'dfatendoc.NUMUNIORI';

	
	const OBSDOC = 'dfatendoc.OBSDOC';

	
	const STAATE = 'dfatendoc.STAATE';

	
	const TABLA = 'dfatendoc.TABLA';

	
	const ANUATE = 'dfatendoc.ANUATE';

	
	const CHKUNI1 = 'dfatendoc.CHKUNI1';

	
	const CHKUNI2 = 'dfatendoc.CHKUNI2';

	
	const CHKUNI3 = 'dfatendoc.CHKUNI3';

	
	const CHKUNI4 = 'dfatendoc.CHKUNI4';

	
	const CHKUNI5 = 'dfatendoc.CHKUNI5';

	
	const CHKUNI6 = 'dfatendoc.CHKUNI6';

	
	const CHKUNI7 = 'dfatendoc.CHKUNI7';

	
	const ID = 'dfatendoc.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codigo', 'Loguse', 'Estado', 'Fecrec', 'Horrec', 'Fecate', 'Horate', 'Numuni', 'Numuniori', 'Obsdoc', 'Staate', 'Tabla', 'Anuate', 'Chkuni1', 'Chkuni2', 'Chkuni3', 'Chkuni4', 'Chkuni5', 'Chkuni6', 'Chkuni7', 'Id', ),
		BasePeer::TYPE_COLNAME => array (DfatendocPeer::CODIGO, DfatendocPeer::LOGUSE, DfatendocPeer::ESTADO, DfatendocPeer::FECREC, DfatendocPeer::HORREC, DfatendocPeer::FECATE, DfatendocPeer::HORATE, DfatendocPeer::NUMUNI, DfatendocPeer::NUMUNIORI, DfatendocPeer::OBSDOC, DfatendocPeer::STAATE, DfatendocPeer::TABLA, DfatendocPeer::ANUATE, DfatendocPeer::CHKUNI1, DfatendocPeer::CHKUNI2, DfatendocPeer::CHKUNI3, DfatendocPeer::CHKUNI4, DfatendocPeer::CHKUNI5, DfatendocPeer::CHKUNI6, DfatendocPeer::CHKUNI7, DfatendocPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codigo', 'loguse', 'estado', 'fecrec', 'horrec', 'fecate', 'horate', 'numuni', 'numuniori', 'obsdoc', 'staate', 'tabla', 'anuate', 'chkuni1', 'chkuni2', 'chkuni3', 'chkuni4', 'chkuni5', 'chkuni6', 'chkuni7', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codigo' => 0, 'Loguse' => 1, 'Estado' => 2, 'Fecrec' => 3, 'Horrec' => 4, 'Fecate' => 5, 'Horate' => 6, 'Numuni' => 7, 'Numuniori' => 8, 'Obsdoc' => 9, 'Staate' => 10, 'Tabla' => 11, 'Anuate' => 12, 'Chkuni1' => 13, 'Chkuni2' => 14, 'Chkuni3' => 15, 'Chkuni4' => 16, 'Chkuni5' => 17, 'Chkuni6' => 18, 'Chkuni7' => 19, 'Id' => 20, ),
		BasePeer::TYPE_COLNAME => array (DfatendocPeer::CODIGO => 0, DfatendocPeer::LOGUSE => 1, DfatendocPeer::ESTADO => 2, DfatendocPeer::FECREC => 3, DfatendocPeer::HORREC => 4, DfatendocPeer::FECATE => 5, DfatendocPeer::HORATE => 6, DfatendocPeer::NUMUNI => 7, DfatendocPeer::NUMUNIORI => 8, DfatendocPeer::OBSDOC => 9, DfatendocPeer::STAATE => 10, DfatendocPeer::TABLA => 11, DfatendocPeer::ANUATE => 12, DfatendocPeer::CHKUNI1 => 13, DfatendocPeer::CHKUNI2 => 14, DfatendocPeer::CHKUNI3 => 15, DfatendocPeer::CHKUNI4 => 16, DfatendocPeer::CHKUNI5 => 17, DfatendocPeer::CHKUNI6 => 18, DfatendocPeer::CHKUNI7 => 19, DfatendocPeer::ID => 20, ),
		BasePeer::TYPE_FIELDNAME => array ('codigo' => 0, 'loguse' => 1, 'estado' => 2, 'fecrec' => 3, 'horrec' => 4, 'fecate' => 5, 'horate' => 6, 'numuni' => 7, 'numuniori' => 8, 'obsdoc' => 9, 'staate' => 10, 'tabla' => 11, 'anuate' => 12, 'chkuni1' => 13, 'chkuni2' => 14, 'chkuni3' => 15, 'chkuni4' => 16, 'chkuni5' => 17, 'chkuni6' => 18, 'chkuni7' => 19, 'id' => 20, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/DfatendocMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.DfatendocMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = DfatendocPeer::getTableMap();
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
		return str_replace(DfatendocPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DfatendocPeer::CODIGO);

		$criteria->addSelectColumn(DfatendocPeer::LOGUSE);

		$criteria->addSelectColumn(DfatendocPeer::ESTADO);

		$criteria->addSelectColumn(DfatendocPeer::FECREC);

		$criteria->addSelectColumn(DfatendocPeer::HORREC);

		$criteria->addSelectColumn(DfatendocPeer::FECATE);

		$criteria->addSelectColumn(DfatendocPeer::HORATE);

		$criteria->addSelectColumn(DfatendocPeer::NUMUNI);

		$criteria->addSelectColumn(DfatendocPeer::NUMUNIORI);

		$criteria->addSelectColumn(DfatendocPeer::OBSDOC);

		$criteria->addSelectColumn(DfatendocPeer::STAATE);

		$criteria->addSelectColumn(DfatendocPeer::TABLA);

		$criteria->addSelectColumn(DfatendocPeer::ANUATE);

		$criteria->addSelectColumn(DfatendocPeer::CHKUNI1);

		$criteria->addSelectColumn(DfatendocPeer::CHKUNI2);

		$criteria->addSelectColumn(DfatendocPeer::CHKUNI3);

		$criteria->addSelectColumn(DfatendocPeer::CHKUNI4);

		$criteria->addSelectColumn(DfatendocPeer::CHKUNI5);

		$criteria->addSelectColumn(DfatendocPeer::CHKUNI6);

		$criteria->addSelectColumn(DfatendocPeer::CHKUNI7);

		$criteria->addSelectColumn(DfatendocPeer::ID);

	}

	const COUNT = 'COUNT(dfatendoc.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT dfatendoc.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = DfatendocPeer::doSelectRS($criteria, $con);
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
		$objects = DfatendocPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return DfatendocPeer::populateObjects(DfatendocPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			DfatendocPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = DfatendocPeer::getOMClass();
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
		return DfatendocPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(DfatendocPeer::ID);
			$selectCriteria->add(DfatendocPeer::ID, $criteria->remove(DfatendocPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(DfatendocPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DfatendocPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Dfatendoc) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DfatendocPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Dfatendoc $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DfatendocPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DfatendocPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DfatendocPeer::DATABASE_NAME, DfatendocPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DfatendocPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(DfatendocPeer::DATABASE_NAME);

		$criteria->add(DfatendocPeer::ID, $pk);


		$v = DfatendocPeer::doSelect($criteria, $con);

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
			$criteria->add(DfatendocPeer::ID, $pks, Criteria::IN);
			$objs = DfatendocPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseDfatendocPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/DfatendocMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.DfatendocMapBuilder');
}
