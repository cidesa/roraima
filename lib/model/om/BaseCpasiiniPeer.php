<?php


abstract class BaseCpasiiniPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpasiini';

	
	const CLASS_DEFAULT = 'lib.model.Cpasiini';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPRE = 'cpasiini.CODPRE';

	
	const NOMPRE = 'cpasiini.NOMPRE';

	
	const PERPRE = 'cpasiini.PERPRE';

	
	const ANOPRE = 'cpasiini.ANOPRE';

	
	const MONASI = 'cpasiini.MONASI';

	
	const MONPRC = 'cpasiini.MONPRC';

	
	const MONCOM = 'cpasiini.MONCOM';

	
	const MONCAU = 'cpasiini.MONCAU';

	
	const MONPAG = 'cpasiini.MONPAG';

	
	const MONTRA = 'cpasiini.MONTRA';

	
	const MONTRN = 'cpasiini.MONTRN';

	
	const MONADI = 'cpasiini.MONADI';

	
	const MONDIM = 'cpasiini.MONDIM';

	
	const MONAJU = 'cpasiini.MONAJU';

	
	const MONDIS = 'cpasiini.MONDIS';

	
	const DIFERE = 'cpasiini.DIFERE';

	
	const STATUS = 'cpasiini.STATUS';

	
	const ID = 'cpasiini.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre', 'Nompre', 'Perpre', 'Anopre', 'Monasi', 'Monprc', 'Moncom', 'Moncau', 'Monpag', 'Montra', 'Montrn', 'Monadi', 'Mondim', 'Monaju', 'Mondis', 'Difere', 'Status', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpasiiniPeer::CODPRE, CpasiiniPeer::NOMPRE, CpasiiniPeer::PERPRE, CpasiiniPeer::ANOPRE, CpasiiniPeer::MONASI, CpasiiniPeer::MONPRC, CpasiiniPeer::MONCOM, CpasiiniPeer::MONCAU, CpasiiniPeer::MONPAG, CpasiiniPeer::MONTRA, CpasiiniPeer::MONTRN, CpasiiniPeer::MONADI, CpasiiniPeer::MONDIM, CpasiiniPeer::MONAJU, CpasiiniPeer::MONDIS, CpasiiniPeer::DIFERE, CpasiiniPeer::STATUS, CpasiiniPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre', 'nompre', 'perpre', 'anopre', 'monasi', 'monprc', 'moncom', 'moncau', 'monpag', 'montra', 'montrn', 'monadi', 'mondim', 'monaju', 'mondis', 'difere', 'status', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre' => 0, 'Nompre' => 1, 'Perpre' => 2, 'Anopre' => 3, 'Monasi' => 4, 'Monprc' => 5, 'Moncom' => 6, 'Moncau' => 7, 'Monpag' => 8, 'Montra' => 9, 'Montrn' => 10, 'Monadi' => 11, 'Mondim' => 12, 'Monaju' => 13, 'Mondis' => 14, 'Difere' => 15, 'Status' => 16, 'Id' => 17, ),
		BasePeer::TYPE_COLNAME => array (CpasiiniPeer::CODPRE => 0, CpasiiniPeer::NOMPRE => 1, CpasiiniPeer::PERPRE => 2, CpasiiniPeer::ANOPRE => 3, CpasiiniPeer::MONASI => 4, CpasiiniPeer::MONPRC => 5, CpasiiniPeer::MONCOM => 6, CpasiiniPeer::MONCAU => 7, CpasiiniPeer::MONPAG => 8, CpasiiniPeer::MONTRA => 9, CpasiiniPeer::MONTRN => 10, CpasiiniPeer::MONADI => 11, CpasiiniPeer::MONDIM => 12, CpasiiniPeer::MONAJU => 13, CpasiiniPeer::MONDIS => 14, CpasiiniPeer::DIFERE => 15, CpasiiniPeer::STATUS => 16, CpasiiniPeer::ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre' => 0, 'nompre' => 1, 'perpre' => 2, 'anopre' => 3, 'monasi' => 4, 'monprc' => 5, 'moncom' => 6, 'moncau' => 7, 'monpag' => 8, 'montra' => 9, 'montrn' => 10, 'monadi' => 11, 'mondim' => 12, 'monaju' => 13, 'mondis' => 14, 'difere' => 15, 'status' => 16, 'id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CpasiiniMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CpasiiniMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpasiiniPeer::getTableMap();
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
		return str_replace(CpasiiniPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpasiiniPeer::CODPRE);

		$criteria->addSelectColumn(CpasiiniPeer::NOMPRE);

		$criteria->addSelectColumn(CpasiiniPeer::PERPRE);

		$criteria->addSelectColumn(CpasiiniPeer::ANOPRE);

		$criteria->addSelectColumn(CpasiiniPeer::MONASI);

		$criteria->addSelectColumn(CpasiiniPeer::MONPRC);

		$criteria->addSelectColumn(CpasiiniPeer::MONCOM);

		$criteria->addSelectColumn(CpasiiniPeer::MONCAU);

		$criteria->addSelectColumn(CpasiiniPeer::MONPAG);

		$criteria->addSelectColumn(CpasiiniPeer::MONTRA);

		$criteria->addSelectColumn(CpasiiniPeer::MONTRN);

		$criteria->addSelectColumn(CpasiiniPeer::MONADI);

		$criteria->addSelectColumn(CpasiiniPeer::MONDIM);

		$criteria->addSelectColumn(CpasiiniPeer::MONAJU);

		$criteria->addSelectColumn(CpasiiniPeer::MONDIS);

		$criteria->addSelectColumn(CpasiiniPeer::DIFERE);

		$criteria->addSelectColumn(CpasiiniPeer::STATUS);

		$criteria->addSelectColumn(CpasiiniPeer::ID);

	}

	const COUNT = 'COUNT(cpasiini.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpasiini.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpasiiniPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpasiiniPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpasiiniPeer::doSelectRS($criteria, $con);
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
		$objects = CpasiiniPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpasiiniPeer::populateObjects(CpasiiniPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpasiiniPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpasiiniPeer::getOMClass();
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
		return CpasiiniPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CpasiiniPeer::ID);
			$selectCriteria->add(CpasiiniPeer::ID, $criteria->remove(CpasiiniPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpasiiniPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpasiiniPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpasiini) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpasiiniPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpasiini $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpasiiniPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpasiiniPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpasiiniPeer::DATABASE_NAME, CpasiiniPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpasiiniPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpasiiniPeer::DATABASE_NAME);

		$criteria->add(CpasiiniPeer::ID, $pk);


		$v = CpasiiniPeer::doSelect($criteria, $con);

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
			$criteria->add(CpasiiniPeer::ID, $pks, Criteria::IN);
			$objs = CpasiiniPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpasiiniPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CpasiiniMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CpasiiniMapBuilder');
}
