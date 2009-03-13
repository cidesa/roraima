<?php


abstract class BaseNpliqempPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npliqemp';

	
	const CLASS_DEFAULT = 'lib.model.Npliqemp';

	
	const NUM_COLUMNS = 23;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npliqemp.CODEMP';

	
	const NUMORD = 'npliqemp.NUMORD';

	
	const TIPCAU = 'npliqemp.TIPCAU';

	
	const REFCAU = 'npliqemp.REFCAU';

	
	const TIPPRC = 'npliqemp.TIPPRC';

	
	const REFPRC = 'npliqemp.REFPRC';

	
	const TIPCOM = 'npliqemp.TIPCOM';

	
	const REFCOM = 'npliqemp.REFCOM';

	
	const CODPRE = 'npliqemp.CODPRE';

	
	const FECEMI = 'npliqemp.FECEMI';

	
	const NUMRIF = 'npliqemp.NUMRIF';

	
	const MONPAG = 'npliqemp.MONPAG';

	
	const MONAJU = 'npliqemp.MONAJU';

	
	const CONPAG = 'npliqemp.CONPAG';

	
	const CAUPAG = 'npliqemp.CAUPAG';

	
	const STATUS = 'npliqemp.STATUS';

	
	const CODCUE = 'npliqemp.CODCUE';

	
	const CODBAN = 'npliqemp.CODBAN';

	
	const NUMCHE = 'npliqemp.NUMCHE';

	
	const NOMDES = 'npliqemp.NOMDES';

	
	const CODCUEDES = 'npliqemp.CODCUEDES';

	
	const DESPAG = 'npliqemp.DESPAG';

	
	const ID = 'npliqemp.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Numord', 'Tipcau', 'Refcau', 'Tipprc', 'Refprc', 'Tipcom', 'Refcom', 'Codpre', 'Fecemi', 'Numrif', 'Monpag', 'Monaju', 'Conpag', 'Caupag', 'Status', 'Codcue', 'Codban', 'Numche', 'Nomdes', 'Codcuedes', 'Despag', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpliqempPeer::CODEMP, NpliqempPeer::NUMORD, NpliqempPeer::TIPCAU, NpliqempPeer::REFCAU, NpliqempPeer::TIPPRC, NpliqempPeer::REFPRC, NpliqempPeer::TIPCOM, NpliqempPeer::REFCOM, NpliqempPeer::CODPRE, NpliqempPeer::FECEMI, NpliqempPeer::NUMRIF, NpliqempPeer::MONPAG, NpliqempPeer::MONAJU, NpliqempPeer::CONPAG, NpliqempPeer::CAUPAG, NpliqempPeer::STATUS, NpliqempPeer::CODCUE, NpliqempPeer::CODBAN, NpliqempPeer::NUMCHE, NpliqempPeer::NOMDES, NpliqempPeer::CODCUEDES, NpliqempPeer::DESPAG, NpliqempPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'numord', 'tipcau', 'refcau', 'tipprc', 'refprc', 'tipcom', 'refcom', 'codpre', 'fecemi', 'numrif', 'monpag', 'monaju', 'conpag', 'caupag', 'status', 'codcue', 'codban', 'numche', 'nomdes', 'codcuedes', 'despag', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Numord' => 1, 'Tipcau' => 2, 'Refcau' => 3, 'Tipprc' => 4, 'Refprc' => 5, 'Tipcom' => 6, 'Refcom' => 7, 'Codpre' => 8, 'Fecemi' => 9, 'Numrif' => 10, 'Monpag' => 11, 'Monaju' => 12, 'Conpag' => 13, 'Caupag' => 14, 'Status' => 15, 'Codcue' => 16, 'Codban' => 17, 'Numche' => 18, 'Nomdes' => 19, 'Codcuedes' => 20, 'Despag' => 21, 'Id' => 22, ),
		BasePeer::TYPE_COLNAME => array (NpliqempPeer::CODEMP => 0, NpliqempPeer::NUMORD => 1, NpliqempPeer::TIPCAU => 2, NpliqempPeer::REFCAU => 3, NpliqempPeer::TIPPRC => 4, NpliqempPeer::REFPRC => 5, NpliqempPeer::TIPCOM => 6, NpliqempPeer::REFCOM => 7, NpliqempPeer::CODPRE => 8, NpliqempPeer::FECEMI => 9, NpliqempPeer::NUMRIF => 10, NpliqempPeer::MONPAG => 11, NpliqempPeer::MONAJU => 12, NpliqempPeer::CONPAG => 13, NpliqempPeer::CAUPAG => 14, NpliqempPeer::STATUS => 15, NpliqempPeer::CODCUE => 16, NpliqempPeer::CODBAN => 17, NpliqempPeer::NUMCHE => 18, NpliqempPeer::NOMDES => 19, NpliqempPeer::CODCUEDES => 20, NpliqempPeer::DESPAG => 21, NpliqempPeer::ID => 22, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'numord' => 1, 'tipcau' => 2, 'refcau' => 3, 'tipprc' => 4, 'refprc' => 5, 'tipcom' => 6, 'refcom' => 7, 'codpre' => 8, 'fecemi' => 9, 'numrif' => 10, 'monpag' => 11, 'monaju' => 12, 'conpag' => 13, 'caupag' => 14, 'status' => 15, 'codcue' => 16, 'codban' => 17, 'numche' => 18, 'nomdes' => 19, 'codcuedes' => 20, 'despag' => 21, 'id' => 22, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpliqempMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpliqempMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpliqempPeer::getTableMap();
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
		return str_replace(NpliqempPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpliqempPeer::CODEMP);

		$criteria->addSelectColumn(NpliqempPeer::NUMORD);

		$criteria->addSelectColumn(NpliqempPeer::TIPCAU);

		$criteria->addSelectColumn(NpliqempPeer::REFCAU);

		$criteria->addSelectColumn(NpliqempPeer::TIPPRC);

		$criteria->addSelectColumn(NpliqempPeer::REFPRC);

		$criteria->addSelectColumn(NpliqempPeer::TIPCOM);

		$criteria->addSelectColumn(NpliqempPeer::REFCOM);

		$criteria->addSelectColumn(NpliqempPeer::CODPRE);

		$criteria->addSelectColumn(NpliqempPeer::FECEMI);

		$criteria->addSelectColumn(NpliqempPeer::NUMRIF);

		$criteria->addSelectColumn(NpliqempPeer::MONPAG);

		$criteria->addSelectColumn(NpliqempPeer::MONAJU);

		$criteria->addSelectColumn(NpliqempPeer::CONPAG);

		$criteria->addSelectColumn(NpliqempPeer::CAUPAG);

		$criteria->addSelectColumn(NpliqempPeer::STATUS);

		$criteria->addSelectColumn(NpliqempPeer::CODCUE);

		$criteria->addSelectColumn(NpliqempPeer::CODBAN);

		$criteria->addSelectColumn(NpliqempPeer::NUMCHE);

		$criteria->addSelectColumn(NpliqempPeer::NOMDES);

		$criteria->addSelectColumn(NpliqempPeer::CODCUEDES);

		$criteria->addSelectColumn(NpliqempPeer::DESPAG);

		$criteria->addSelectColumn(NpliqempPeer::ID);

	}

	const COUNT = 'COUNT(npliqemp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npliqemp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpliqempPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpliqempPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpliqempPeer::doSelectRS($criteria, $con);
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
		$objects = NpliqempPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpliqempPeer::populateObjects(NpliqempPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpliqempPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpliqempPeer::getOMClass();
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
		return NpliqempPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpliqempPeer::ID); 

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
			$comparison = $criteria->getComparison(NpliqempPeer::ID);
			$selectCriteria->add(NpliqempPeer::ID, $criteria->remove(NpliqempPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpliqempPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpliqempPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npliqemp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpliqempPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npliqemp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpliqempPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpliqempPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpliqempPeer::DATABASE_NAME, NpliqempPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpliqempPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpliqempPeer::DATABASE_NAME);

		$criteria->add(NpliqempPeer::ID, $pk);


		$v = NpliqempPeer::doSelect($criteria, $con);

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
			$criteria->add(NpliqempPeer::ID, $pks, Criteria::IN);
			$objs = NpliqempPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpliqempPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpliqempMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpliqempMapBuilder');
}
