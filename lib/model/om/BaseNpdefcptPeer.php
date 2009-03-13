<?php


abstract class BaseNpdefcptPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npdefcpt';

	
	const CLASS_DEFAULT = 'lib.model.Npdefcpt';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCON = 'npdefcpt.CODCON';

	
	const NOMCON = 'npdefcpt.NOMCON';

	
	const CODPAR = 'npdefcpt.CODPAR';

	
	const OPECON = 'npdefcpt.OPECON';

	
	const ACUHIS = 'npdefcpt.ACUHIS';

	
	const INIMON = 'npdefcpt.INIMON';

	
	const CONACT = 'npdefcpt.CONACT';

	
	const IMPCPT = 'npdefcpt.IMPCPT';

	
	const ORDPAG = 'npdefcpt.ORDPAG';

	
	const AFEPRE = 'npdefcpt.AFEPRE';

	
	const FRECON = 'npdefcpt.FRECON';

	
	const NROCTA = 'npdefcpt.NROCTA';

	
	const ID = 'npdefcpt.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcon', 'Nomcon', 'Codpar', 'Opecon', 'Acuhis', 'Inimon', 'Conact', 'Impcpt', 'Ordpag', 'Afepre', 'Frecon', 'Nrocta', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpdefcptPeer::CODCON, NpdefcptPeer::NOMCON, NpdefcptPeer::CODPAR, NpdefcptPeer::OPECON, NpdefcptPeer::ACUHIS, NpdefcptPeer::INIMON, NpdefcptPeer::CONACT, NpdefcptPeer::IMPCPT, NpdefcptPeer::ORDPAG, NpdefcptPeer::AFEPRE, NpdefcptPeer::FRECON, NpdefcptPeer::NROCTA, NpdefcptPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcon', 'nomcon', 'codpar', 'opecon', 'acuhis', 'inimon', 'conact', 'impcpt', 'ordpag', 'afepre', 'frecon', 'nrocta', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcon' => 0, 'Nomcon' => 1, 'Codpar' => 2, 'Opecon' => 3, 'Acuhis' => 4, 'Inimon' => 5, 'Conact' => 6, 'Impcpt' => 7, 'Ordpag' => 8, 'Afepre' => 9, 'Frecon' => 10, 'Nrocta' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (NpdefcptPeer::CODCON => 0, NpdefcptPeer::NOMCON => 1, NpdefcptPeer::CODPAR => 2, NpdefcptPeer::OPECON => 3, NpdefcptPeer::ACUHIS => 4, NpdefcptPeer::INIMON => 5, NpdefcptPeer::CONACT => 6, NpdefcptPeer::IMPCPT => 7, NpdefcptPeer::ORDPAG => 8, NpdefcptPeer::AFEPRE => 9, NpdefcptPeer::FRECON => 10, NpdefcptPeer::NROCTA => 11, NpdefcptPeer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('codcon' => 0, 'nomcon' => 1, 'codpar' => 2, 'opecon' => 3, 'acuhis' => 4, 'inimon' => 5, 'conact' => 6, 'impcpt' => 7, 'ordpag' => 8, 'afepre' => 9, 'frecon' => 10, 'nrocta' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpdefcptMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpdefcptMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpdefcptPeer::getTableMap();
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
		return str_replace(NpdefcptPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpdefcptPeer::CODCON);

		$criteria->addSelectColumn(NpdefcptPeer::NOMCON);

		$criteria->addSelectColumn(NpdefcptPeer::CODPAR);

		$criteria->addSelectColumn(NpdefcptPeer::OPECON);

		$criteria->addSelectColumn(NpdefcptPeer::ACUHIS);

		$criteria->addSelectColumn(NpdefcptPeer::INIMON);

		$criteria->addSelectColumn(NpdefcptPeer::CONACT);

		$criteria->addSelectColumn(NpdefcptPeer::IMPCPT);

		$criteria->addSelectColumn(NpdefcptPeer::ORDPAG);

		$criteria->addSelectColumn(NpdefcptPeer::AFEPRE);

		$criteria->addSelectColumn(NpdefcptPeer::FRECON);

		$criteria->addSelectColumn(NpdefcptPeer::NROCTA);

		$criteria->addSelectColumn(NpdefcptPeer::ID);

	}

	const COUNT = 'COUNT(npdefcpt.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npdefcpt.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpdefcptPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpdefcptPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpdefcptPeer::doSelectRS($criteria, $con);
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
		$objects = NpdefcptPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpdefcptPeer::populateObjects(NpdefcptPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpdefcptPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpdefcptPeer::getOMClass();
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
		return NpdefcptPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpdefcptPeer::ID); 

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
			$comparison = $criteria->getComparison(NpdefcptPeer::ID);
			$selectCriteria->add(NpdefcptPeer::ID, $criteria->remove(NpdefcptPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpdefcptPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpdefcptPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npdefcpt) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpdefcptPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npdefcpt $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpdefcptPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpdefcptPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpdefcptPeer::DATABASE_NAME, NpdefcptPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpdefcptPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpdefcptPeer::DATABASE_NAME);

		$criteria->add(NpdefcptPeer::ID, $pk);


		$v = NpdefcptPeer::doSelect($criteria, $con);

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
			$criteria->add(NpdefcptPeer::ID, $pks, Criteria::IN);
			$objs = NpdefcptPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpdefcptPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpdefcptMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpdefcptMapBuilder');
}
