<?php


abstract class BaseNpordpagPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npordpag';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npordpag';

	
	const NUM_COLUMNS = 23;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMORD = 'npordpag.NUMORD';

	
	const TIPCAU = 'npordpag.TIPCAU';

	
	const REFCAU = 'npordpag.REFCAU';

	
	const TIPPRC = 'npordpag.TIPPRC';

	
	const REFPRC = 'npordpag.REFPRC';

	
	const TIPCOM = 'npordpag.TIPCOM';

	
	const REFCOM = 'npordpag.REFCOM';

	
	const CODPRE = 'npordpag.CODPRE';

	
	const FECEMI = 'npordpag.FECEMI';

	
	const NUMRIF = 'npordpag.NUMRIF';

	
	const CODEMP = 'npordpag.CODEMP';

	
	const MONPAG = 'npordpag.MONPAG';

	
	const MONAJU = 'npordpag.MONAJU';

	
	const CONPAG = 'npordpag.CONPAG';

	
	const CAUPAG = 'npordpag.CAUPAG';

	
	const STATUS = 'npordpag.STATUS';

	
	const CODCUE = 'npordpag.CODCUE';

	
	const CODBAN = 'npordpag.CODBAN';

	
	const NUMCHE = 'npordpag.NUMCHE';

	
	const NOMDES = 'npordpag.NOMDES';

	
	const CODCUEDES = 'npordpag.CODCUEDES';

	
	const DESPAG = 'npordpag.DESPAG';

	
	const ID = 'npordpag.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numord', 'Tipcau', 'Refcau', 'Tipprc', 'Refprc', 'Tipcom', 'Refcom', 'Codpre', 'Fecemi', 'Numrif', 'Codemp', 'Monpag', 'Monaju', 'Conpag', 'Caupag', 'Status', 'Codcue', 'Codban', 'Numche', 'Nomdes', 'Codcuedes', 'Despag', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpordpagPeer::NUMORD, NpordpagPeer::TIPCAU, NpordpagPeer::REFCAU, NpordpagPeer::TIPPRC, NpordpagPeer::REFPRC, NpordpagPeer::TIPCOM, NpordpagPeer::REFCOM, NpordpagPeer::CODPRE, NpordpagPeer::FECEMI, NpordpagPeer::NUMRIF, NpordpagPeer::CODEMP, NpordpagPeer::MONPAG, NpordpagPeer::MONAJU, NpordpagPeer::CONPAG, NpordpagPeer::CAUPAG, NpordpagPeer::STATUS, NpordpagPeer::CODCUE, NpordpagPeer::CODBAN, NpordpagPeer::NUMCHE, NpordpagPeer::NOMDES, NpordpagPeer::CODCUEDES, NpordpagPeer::DESPAG, NpordpagPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numord', 'tipcau', 'refcau', 'tipprc', 'refprc', 'tipcom', 'refcom', 'codpre', 'fecemi', 'numrif', 'codemp', 'monpag', 'monaju', 'conpag', 'caupag', 'status', 'codcue', 'codban', 'numche', 'nomdes', 'codcuedes', 'despag', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numord' => 0, 'Tipcau' => 1, 'Refcau' => 2, 'Tipprc' => 3, 'Refprc' => 4, 'Tipcom' => 5, 'Refcom' => 6, 'Codpre' => 7, 'Fecemi' => 8, 'Numrif' => 9, 'Codemp' => 10, 'Monpag' => 11, 'Monaju' => 12, 'Conpag' => 13, 'Caupag' => 14, 'Status' => 15, 'Codcue' => 16, 'Codban' => 17, 'Numche' => 18, 'Nomdes' => 19, 'Codcuedes' => 20, 'Despag' => 21, 'Id' => 22, ),
		BasePeer::TYPE_COLNAME => array (NpordpagPeer::NUMORD => 0, NpordpagPeer::TIPCAU => 1, NpordpagPeer::REFCAU => 2, NpordpagPeer::TIPPRC => 3, NpordpagPeer::REFPRC => 4, NpordpagPeer::TIPCOM => 5, NpordpagPeer::REFCOM => 6, NpordpagPeer::CODPRE => 7, NpordpagPeer::FECEMI => 8, NpordpagPeer::NUMRIF => 9, NpordpagPeer::CODEMP => 10, NpordpagPeer::MONPAG => 11, NpordpagPeer::MONAJU => 12, NpordpagPeer::CONPAG => 13, NpordpagPeer::CAUPAG => 14, NpordpagPeer::STATUS => 15, NpordpagPeer::CODCUE => 16, NpordpagPeer::CODBAN => 17, NpordpagPeer::NUMCHE => 18, NpordpagPeer::NOMDES => 19, NpordpagPeer::CODCUEDES => 20, NpordpagPeer::DESPAG => 21, NpordpagPeer::ID => 22, ),
		BasePeer::TYPE_FIELDNAME => array ('numord' => 0, 'tipcau' => 1, 'refcau' => 2, 'tipprc' => 3, 'refprc' => 4, 'tipcom' => 5, 'refcom' => 6, 'codpre' => 7, 'fecemi' => 8, 'numrif' => 9, 'codemp' => 10, 'monpag' => 11, 'monaju' => 12, 'conpag' => 13, 'caupag' => 14, 'status' => 15, 'codcue' => 16, 'codban' => 17, 'numche' => 18, 'nomdes' => 19, 'codcuedes' => 20, 'despag' => 21, 'id' => 22, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpordpagMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpordpagMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpordpagPeer::getTableMap();
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
		return str_replace(NpordpagPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpordpagPeer::NUMORD);

		$criteria->addSelectColumn(NpordpagPeer::TIPCAU);

		$criteria->addSelectColumn(NpordpagPeer::REFCAU);

		$criteria->addSelectColumn(NpordpagPeer::TIPPRC);

		$criteria->addSelectColumn(NpordpagPeer::REFPRC);

		$criteria->addSelectColumn(NpordpagPeer::TIPCOM);

		$criteria->addSelectColumn(NpordpagPeer::REFCOM);

		$criteria->addSelectColumn(NpordpagPeer::CODPRE);

		$criteria->addSelectColumn(NpordpagPeer::FECEMI);

		$criteria->addSelectColumn(NpordpagPeer::NUMRIF);

		$criteria->addSelectColumn(NpordpagPeer::CODEMP);

		$criteria->addSelectColumn(NpordpagPeer::MONPAG);

		$criteria->addSelectColumn(NpordpagPeer::MONAJU);

		$criteria->addSelectColumn(NpordpagPeer::CONPAG);

		$criteria->addSelectColumn(NpordpagPeer::CAUPAG);

		$criteria->addSelectColumn(NpordpagPeer::STATUS);

		$criteria->addSelectColumn(NpordpagPeer::CODCUE);

		$criteria->addSelectColumn(NpordpagPeer::CODBAN);

		$criteria->addSelectColumn(NpordpagPeer::NUMCHE);

		$criteria->addSelectColumn(NpordpagPeer::NOMDES);

		$criteria->addSelectColumn(NpordpagPeer::CODCUEDES);

		$criteria->addSelectColumn(NpordpagPeer::DESPAG);

		$criteria->addSelectColumn(NpordpagPeer::ID);

	}

	const COUNT = 'COUNT(npordpag.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npordpag.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpordpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpordpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpordpagPeer::doSelectRS($criteria, $con);
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
		$objects = NpordpagPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpordpagPeer::populateObjects(NpordpagPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpordpagPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpordpagPeer::getOMClass();
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
		return NpordpagPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpordpagPeer::ID); 

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
			$comparison = $criteria->getComparison(NpordpagPeer::ID);
			$selectCriteria->add(NpordpagPeer::ID, $criteria->remove(NpordpagPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpordpagPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpordpagPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npordpag) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpordpagPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npordpag $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpordpagPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpordpagPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpordpagPeer::DATABASE_NAME, NpordpagPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpordpagPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpordpagPeer::DATABASE_NAME);

		$criteria->add(NpordpagPeer::ID, $pk);


		$v = NpordpagPeer::doSelect($criteria, $con);

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
			$criteria->add(NpordpagPeer::ID, $pks, Criteria::IN);
			$objs = NpordpagPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpordpagPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpordpagMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpordpagMapBuilder');
}
