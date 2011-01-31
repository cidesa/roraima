<?php


abstract class BaseCsrecobrdirPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'csrecobrdir';

	
	const CLASS_DEFAULT = 'lib.model.Csrecobrdir';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPROD = 'csrecobrdir.CODPROD';

	
	const CODFAS = 'csrecobrdir.CODFAS';

	
	const CODCAR = 'csrecobrdir.CODCAR';

	
	const CANEMP = 'csrecobrdir.CANEMP';

	
	const HOREMP = 'csrecobrdir.HOREMP';

	
	const TIPCON = 'csrecobrdir.TIPCON';

	
	const COSTOT = 'csrecobrdir.COSTOT';

	
	const JORNADA = 'csrecobrdir.JORNADA';

	
	const DIAVIA = 'csrecobrdir.DIAVIA';

	
	const NROORD = 'csrecobrdir.NROORD';

	
	const CODEMP = 'csrecobrdir.CODEMP';

	
	const ID = 'csrecobrdir.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codprod', 'Codfas', 'Codcar', 'Canemp', 'Horemp', 'Tipcon', 'Costot', 'Jornada', 'Diavia', 'Nroord', 'Codemp', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CsrecobrdirPeer::CODPROD, CsrecobrdirPeer::CODFAS, CsrecobrdirPeer::CODCAR, CsrecobrdirPeer::CANEMP, CsrecobrdirPeer::HOREMP, CsrecobrdirPeer::TIPCON, CsrecobrdirPeer::COSTOT, CsrecobrdirPeer::JORNADA, CsrecobrdirPeer::DIAVIA, CsrecobrdirPeer::NROORD, CsrecobrdirPeer::CODEMP, CsrecobrdirPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codprod', 'codfas', 'codcar', 'canemp', 'horemp', 'tipcon', 'costot', 'jornada', 'diavia', 'nroord', 'codemp', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codprod' => 0, 'Codfas' => 1, 'Codcar' => 2, 'Canemp' => 3, 'Horemp' => 4, 'Tipcon' => 5, 'Costot' => 6, 'Jornada' => 7, 'Diavia' => 8, 'Nroord' => 9, 'Codemp' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (CsrecobrdirPeer::CODPROD => 0, CsrecobrdirPeer::CODFAS => 1, CsrecobrdirPeer::CODCAR => 2, CsrecobrdirPeer::CANEMP => 3, CsrecobrdirPeer::HOREMP => 4, CsrecobrdirPeer::TIPCON => 5, CsrecobrdirPeer::COSTOT => 6, CsrecobrdirPeer::JORNADA => 7, CsrecobrdirPeer::DIAVIA => 8, CsrecobrdirPeer::NROORD => 9, CsrecobrdirPeer::CODEMP => 10, CsrecobrdirPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('codprod' => 0, 'codfas' => 1, 'codcar' => 2, 'canemp' => 3, 'horemp' => 4, 'tipcon' => 5, 'costot' => 6, 'jornada' => 7, 'diavia' => 8, 'nroord' => 9, 'codemp' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CsrecobrdirMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CsrecobrdirMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CsrecobrdirPeer::getTableMap();
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
		return str_replace(CsrecobrdirPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CsrecobrdirPeer::CODPROD);

		$criteria->addSelectColumn(CsrecobrdirPeer::CODFAS);

		$criteria->addSelectColumn(CsrecobrdirPeer::CODCAR);

		$criteria->addSelectColumn(CsrecobrdirPeer::CANEMP);

		$criteria->addSelectColumn(CsrecobrdirPeer::HOREMP);

		$criteria->addSelectColumn(CsrecobrdirPeer::TIPCON);

		$criteria->addSelectColumn(CsrecobrdirPeer::COSTOT);

		$criteria->addSelectColumn(CsrecobrdirPeer::JORNADA);

		$criteria->addSelectColumn(CsrecobrdirPeer::DIAVIA);

		$criteria->addSelectColumn(CsrecobrdirPeer::NROORD);

		$criteria->addSelectColumn(CsrecobrdirPeer::CODEMP);

		$criteria->addSelectColumn(CsrecobrdirPeer::ID);

	}

	const COUNT = 'COUNT(csrecobrdir.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT csrecobrdir.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CsrecobrdirPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CsrecobrdirPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CsrecobrdirPeer::doSelectRS($criteria, $con);
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
		$objects = CsrecobrdirPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CsrecobrdirPeer::populateObjects(CsrecobrdirPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CsrecobrdirPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CsrecobrdirPeer::getOMClass();
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
		return CsrecobrdirPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CsrecobrdirPeer::ID);
			$selectCriteria->add(CsrecobrdirPeer::ID, $criteria->remove(CsrecobrdirPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CsrecobrdirPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CsrecobrdirPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Csrecobrdir) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CsrecobrdirPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Csrecobrdir $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CsrecobrdirPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CsrecobrdirPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CsrecobrdirPeer::DATABASE_NAME, CsrecobrdirPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CsrecobrdirPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CsrecobrdirPeer::DATABASE_NAME);

		$criteria->add(CsrecobrdirPeer::ID, $pk);


		$v = CsrecobrdirPeer::doSelect($criteria, $con);

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
			$criteria->add(CsrecobrdirPeer::ID, $pks, Criteria::IN);
			$objs = CsrecobrdirPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCsrecobrdirPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CsrecobrdirMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CsrecobrdirMapBuilder');
}
