<?php


abstract class BaseOpautpagPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'opautpag';

	
	const CLASS_DEFAULT = 'lib.model.Opautpag';

	
	const NUM_COLUMNS = 35;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMORD = 'opautpag.NUMORD';

	
	const TIPCAU = 'opautpag.TIPCAU';

	
	const FECEMI = 'opautpag.FECEMI';

	
	const CEDRIF = 'opautpag.CEDRIF';

	
	const NOMBEN = 'opautpag.NOMBEN';

	
	const MONORD = 'opautpag.MONORD';

	
	const DESORD = 'opautpag.DESORD';

	
	const MONDES = 'opautpag.MONDES';

	
	const MONRET = 'opautpag.MONRET';

	
	const NUMCHE = 'opautpag.NUMCHE';

	
	const CTABAN = 'opautpag.CTABAN';

	
	const CTAPAG = 'opautpag.CTAPAG';

	
	const NUMCOM = 'opautpag.NUMCOM';

	
	const STATUS = 'opautpag.STATUS';

	
	const CODUNI = 'opautpag.CODUNI';

	
	const FECENVCON = 'opautpag.FECENVCON';

	
	const FECENVFIN = 'opautpag.FECENVFIN';

	
	const CTAPAGFIN = 'opautpag.CTAPAGFIN';

	
	const NOMBENSUS = 'opautpag.NOMBENSUS';

	
	const FECANU = 'opautpag.FECANU';

	
	const FECRECFIN = 'opautpag.FECRECFIN';

	
	const ANOPRE = 'opautpag.ANOPRE';

	
	const FECPAG = 'opautpag.FECPAG';

	
	const MONPAG = 'opautpag.MONPAG';

	
	const OBSORD = 'opautpag.OBSORD';

	
	const NUMTIQ = 'opautpag.NUMTIQ';

	
	const PERAUT = 'opautpag.PERAUT';

	
	const DESANU = 'opautpag.DESANU';

	
	const CEDAUT = 'opautpag.CEDAUT';

	
	const NOMPER1 = 'opautpag.NOMPER1';

	
	const NOMPER2 = 'opautpag.NOMPER2';

	
	const HORCON = 'opautpag.HORCON';

	
	const FECCON = 'opautpag.FECCON';

	
	const NOMCAT = 'opautpag.NOMCAT';

	
	const ID = 'opautpag.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numord', 'Tipcau', 'Fecemi', 'Cedrif', 'Nomben', 'Monord', 'Desord', 'Mondes', 'Monret', 'Numche', 'Ctaban', 'Ctapag', 'Numcom', 'Status', 'Coduni', 'Fecenvcon', 'Fecenvfin', 'Ctapagfin', 'Nombensus', 'Fecanu', 'Fecrecfin', 'Anopre', 'Fecpag', 'Monpag', 'Obsord', 'Numtiq', 'Peraut', 'Desanu', 'Cedaut', 'Nomper1', 'Nomper2', 'Horcon', 'Feccon', 'Nomcat', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OpautpagPeer::NUMORD, OpautpagPeer::TIPCAU, OpautpagPeer::FECEMI, OpautpagPeer::CEDRIF, OpautpagPeer::NOMBEN, OpautpagPeer::MONORD, OpautpagPeer::DESORD, OpautpagPeer::MONDES, OpautpagPeer::MONRET, OpautpagPeer::NUMCHE, OpautpagPeer::CTABAN, OpautpagPeer::CTAPAG, OpautpagPeer::NUMCOM, OpautpagPeer::STATUS, OpautpagPeer::CODUNI, OpautpagPeer::FECENVCON, OpautpagPeer::FECENVFIN, OpautpagPeer::CTAPAGFIN, OpautpagPeer::NOMBENSUS, OpautpagPeer::FECANU, OpautpagPeer::FECRECFIN, OpautpagPeer::ANOPRE, OpautpagPeer::FECPAG, OpautpagPeer::MONPAG, OpautpagPeer::OBSORD, OpautpagPeer::NUMTIQ, OpautpagPeer::PERAUT, OpautpagPeer::DESANU, OpautpagPeer::CEDAUT, OpautpagPeer::NOMPER1, OpautpagPeer::NOMPER2, OpautpagPeer::HORCON, OpautpagPeer::FECCON, OpautpagPeer::NOMCAT, OpautpagPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numord', 'tipcau', 'fecemi', 'cedrif', 'nomben', 'monord', 'desord', 'mondes', 'monret', 'numche', 'ctaban', 'ctapag', 'numcom', 'status', 'coduni', 'fecenvcon', 'fecenvfin', 'ctapagfin', 'nombensus', 'fecanu', 'fecrecfin', 'anopre', 'fecpag', 'monpag', 'obsord', 'numtiq', 'peraut', 'desanu', 'cedaut', 'nomper1', 'nomper2', 'horcon', 'feccon', 'nomcat', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numord' => 0, 'Tipcau' => 1, 'Fecemi' => 2, 'Cedrif' => 3, 'Nomben' => 4, 'Monord' => 5, 'Desord' => 6, 'Mondes' => 7, 'Monret' => 8, 'Numche' => 9, 'Ctaban' => 10, 'Ctapag' => 11, 'Numcom' => 12, 'Status' => 13, 'Coduni' => 14, 'Fecenvcon' => 15, 'Fecenvfin' => 16, 'Ctapagfin' => 17, 'Nombensus' => 18, 'Fecanu' => 19, 'Fecrecfin' => 20, 'Anopre' => 21, 'Fecpag' => 22, 'Monpag' => 23, 'Obsord' => 24, 'Numtiq' => 25, 'Peraut' => 26, 'Desanu' => 27, 'Cedaut' => 28, 'Nomper1' => 29, 'Nomper2' => 30, 'Horcon' => 31, 'Feccon' => 32, 'Nomcat' => 33, 'Id' => 34, ),
		BasePeer::TYPE_COLNAME => array (OpautpagPeer::NUMORD => 0, OpautpagPeer::TIPCAU => 1, OpautpagPeer::FECEMI => 2, OpautpagPeer::CEDRIF => 3, OpautpagPeer::NOMBEN => 4, OpautpagPeer::MONORD => 5, OpautpagPeer::DESORD => 6, OpautpagPeer::MONDES => 7, OpautpagPeer::MONRET => 8, OpautpagPeer::NUMCHE => 9, OpautpagPeer::CTABAN => 10, OpautpagPeer::CTAPAG => 11, OpautpagPeer::NUMCOM => 12, OpautpagPeer::STATUS => 13, OpautpagPeer::CODUNI => 14, OpautpagPeer::FECENVCON => 15, OpautpagPeer::FECENVFIN => 16, OpautpagPeer::CTAPAGFIN => 17, OpautpagPeer::NOMBENSUS => 18, OpautpagPeer::FECANU => 19, OpautpagPeer::FECRECFIN => 20, OpautpagPeer::ANOPRE => 21, OpautpagPeer::FECPAG => 22, OpautpagPeer::MONPAG => 23, OpautpagPeer::OBSORD => 24, OpautpagPeer::NUMTIQ => 25, OpautpagPeer::PERAUT => 26, OpautpagPeer::DESANU => 27, OpautpagPeer::CEDAUT => 28, OpautpagPeer::NOMPER1 => 29, OpautpagPeer::NOMPER2 => 30, OpautpagPeer::HORCON => 31, OpautpagPeer::FECCON => 32, OpautpagPeer::NOMCAT => 33, OpautpagPeer::ID => 34, ),
		BasePeer::TYPE_FIELDNAME => array ('numord' => 0, 'tipcau' => 1, 'fecemi' => 2, 'cedrif' => 3, 'nomben' => 4, 'monord' => 5, 'desord' => 6, 'mondes' => 7, 'monret' => 8, 'numche' => 9, 'ctaban' => 10, 'ctapag' => 11, 'numcom' => 12, 'status' => 13, 'coduni' => 14, 'fecenvcon' => 15, 'fecenvfin' => 16, 'ctapagfin' => 17, 'nombensus' => 18, 'fecanu' => 19, 'fecrecfin' => 20, 'anopre' => 21, 'fecpag' => 22, 'monpag' => 23, 'obsord' => 24, 'numtiq' => 25, 'peraut' => 26, 'desanu' => 27, 'cedaut' => 28, 'nomper1' => 29, 'nomper2' => 30, 'horcon' => 31, 'feccon' => 32, 'nomcat' => 33, 'id' => 34, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OpautpagMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OpautpagMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OpautpagPeer::getTableMap();
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
		return str_replace(OpautpagPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OpautpagPeer::NUMORD);

		$criteria->addSelectColumn(OpautpagPeer::TIPCAU);

		$criteria->addSelectColumn(OpautpagPeer::FECEMI);

		$criteria->addSelectColumn(OpautpagPeer::CEDRIF);

		$criteria->addSelectColumn(OpautpagPeer::NOMBEN);

		$criteria->addSelectColumn(OpautpagPeer::MONORD);

		$criteria->addSelectColumn(OpautpagPeer::DESORD);

		$criteria->addSelectColumn(OpautpagPeer::MONDES);

		$criteria->addSelectColumn(OpautpagPeer::MONRET);

		$criteria->addSelectColumn(OpautpagPeer::NUMCHE);

		$criteria->addSelectColumn(OpautpagPeer::CTABAN);

		$criteria->addSelectColumn(OpautpagPeer::CTAPAG);

		$criteria->addSelectColumn(OpautpagPeer::NUMCOM);

		$criteria->addSelectColumn(OpautpagPeer::STATUS);

		$criteria->addSelectColumn(OpautpagPeer::CODUNI);

		$criteria->addSelectColumn(OpautpagPeer::FECENVCON);

		$criteria->addSelectColumn(OpautpagPeer::FECENVFIN);

		$criteria->addSelectColumn(OpautpagPeer::CTAPAGFIN);

		$criteria->addSelectColumn(OpautpagPeer::NOMBENSUS);

		$criteria->addSelectColumn(OpautpagPeer::FECANU);

		$criteria->addSelectColumn(OpautpagPeer::FECRECFIN);

		$criteria->addSelectColumn(OpautpagPeer::ANOPRE);

		$criteria->addSelectColumn(OpautpagPeer::FECPAG);

		$criteria->addSelectColumn(OpautpagPeer::MONPAG);

		$criteria->addSelectColumn(OpautpagPeer::OBSORD);

		$criteria->addSelectColumn(OpautpagPeer::NUMTIQ);

		$criteria->addSelectColumn(OpautpagPeer::PERAUT);

		$criteria->addSelectColumn(OpautpagPeer::DESANU);

		$criteria->addSelectColumn(OpautpagPeer::CEDAUT);

		$criteria->addSelectColumn(OpautpagPeer::NOMPER1);

		$criteria->addSelectColumn(OpautpagPeer::NOMPER2);

		$criteria->addSelectColumn(OpautpagPeer::HORCON);

		$criteria->addSelectColumn(OpautpagPeer::FECCON);

		$criteria->addSelectColumn(OpautpagPeer::NOMCAT);

		$criteria->addSelectColumn(OpautpagPeer::ID);

	}

	const COUNT = 'COUNT(opautpag.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT opautpag.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OpautpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OpautpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OpautpagPeer::doSelectRS($criteria, $con);
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
		$objects = OpautpagPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OpautpagPeer::populateObjects(OpautpagPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OpautpagPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OpautpagPeer::getOMClass();
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
		return OpautpagPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(OpautpagPeer::ID);
			$selectCriteria->add(OpautpagPeer::ID, $criteria->remove(OpautpagPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OpautpagPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OpautpagPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Opautpag) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OpautpagPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Opautpag $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OpautpagPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OpautpagPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OpautpagPeer::DATABASE_NAME, OpautpagPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OpautpagPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OpautpagPeer::DATABASE_NAME);

		$criteria->add(OpautpagPeer::ID, $pk);


		$v = OpautpagPeer::doSelect($criteria, $con);

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
			$criteria->add(OpautpagPeer::ID, $pks, Criteria::IN);
			$objs = OpautpagPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOpautpagPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OpautpagMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OpautpagMapBuilder');
}
