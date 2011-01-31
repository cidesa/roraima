<?php


abstract class BaseCaregartrPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'caregartr';

	
	const CLASS_DEFAULT = 'lib.model.Caregartr';

	
	const NUM_COLUMNS = 29;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODART = 'caregartr.CODART';

	
	const DESART = 'caregartr.DESART';

	
	const CODCTA = 'caregartr.CODCTA';

	
	const CODPAR = 'caregartr.CODPAR';

	
	const RAMART = 'caregartr.RAMART';

	
	const COSULT = 'caregartr.COSULT';

	
	const COSPRO = 'caregartr.COSPRO';

	
	const EXITOT = 'caregartr.EXITOT';

	
	const UNIMED = 'caregartr.UNIMED';

	
	const UNIALT = 'caregartr.UNIALT';

	
	const RELART = 'caregartr.RELART';

	
	const FECULT = 'caregartr.FECULT';

	
	const INVINI = 'caregartr.INVINI';

	
	const CODMAR = 'caregartr.CODMAR';

	
	const CODREF = 'caregartr.CODREF';

	
	const COSTOT = 'caregartr.COSTOT';

	
	const SIGECOF = 'caregartr.SIGECOF';

	
	const CODCLAART = 'caregartr.CODCLAART';

	
	const LOTUNI = 'caregartr.LOTUNI';

	
	const CTAVTA = 'caregartr.CTAVTA';

	
	const CTACOS = 'caregartr.CTACOS';

	
	const CTAPRO = 'caregartr.CTAPRO';

	
	const PREART = 'caregartr.PREART';

	
	const DISTOT = 'caregartr.DISTOT';

	
	const TIPO = 'caregartr.TIPO';

	
	const TIP0 = 'caregartr.TIP0';

	
	const CODING = 'caregartr.CODING';

	
	const MERCON = 'caregartr.MERCON';

	
	const ID = 'caregartr.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codart', 'Desart', 'Codcta', 'Codpar', 'Ramart', 'Cosult', 'Cospro', 'Exitot', 'Unimed', 'Unialt', 'Relart', 'Fecult', 'Invini', 'Codmar', 'Codref', 'Costot', 'Sigecof', 'Codclaart', 'Lotuni', 'Ctavta', 'Ctacos', 'Ctapro', 'Preart', 'Distot', 'Tipo', 'Tip0', 'Coding', 'Mercon', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CaregartrPeer::CODART, CaregartrPeer::DESART, CaregartrPeer::CODCTA, CaregartrPeer::CODPAR, CaregartrPeer::RAMART, CaregartrPeer::COSULT, CaregartrPeer::COSPRO, CaregartrPeer::EXITOT, CaregartrPeer::UNIMED, CaregartrPeer::UNIALT, CaregartrPeer::RELART, CaregartrPeer::FECULT, CaregartrPeer::INVINI, CaregartrPeer::CODMAR, CaregartrPeer::CODREF, CaregartrPeer::COSTOT, CaregartrPeer::SIGECOF, CaregartrPeer::CODCLAART, CaregartrPeer::LOTUNI, CaregartrPeer::CTAVTA, CaregartrPeer::CTACOS, CaregartrPeer::CTAPRO, CaregartrPeer::PREART, CaregartrPeer::DISTOT, CaregartrPeer::TIPO, CaregartrPeer::TIP0, CaregartrPeer::CODING, CaregartrPeer::MERCON, CaregartrPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codart', 'desart', 'codcta', 'codpar', 'ramart', 'cosult', 'cospro', 'exitot', 'unimed', 'unialt', 'relart', 'fecult', 'invini', 'codmar', 'codref', 'costot', 'sigecof', 'codclaart', 'lotuni', 'ctavta', 'ctacos', 'ctapro', 'preart', 'distot', 'tipo', 'tip0', 'coding', 'mercon', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codart' => 0, 'Desart' => 1, 'Codcta' => 2, 'Codpar' => 3, 'Ramart' => 4, 'Cosult' => 5, 'Cospro' => 6, 'Exitot' => 7, 'Unimed' => 8, 'Unialt' => 9, 'Relart' => 10, 'Fecult' => 11, 'Invini' => 12, 'Codmar' => 13, 'Codref' => 14, 'Costot' => 15, 'Sigecof' => 16, 'Codclaart' => 17, 'Lotuni' => 18, 'Ctavta' => 19, 'Ctacos' => 20, 'Ctapro' => 21, 'Preart' => 22, 'Distot' => 23, 'Tipo' => 24, 'Tip0' => 25, 'Coding' => 26, 'Mercon' => 27, 'Id' => 28, ),
		BasePeer::TYPE_COLNAME => array (CaregartrPeer::CODART => 0, CaregartrPeer::DESART => 1, CaregartrPeer::CODCTA => 2, CaregartrPeer::CODPAR => 3, CaregartrPeer::RAMART => 4, CaregartrPeer::COSULT => 5, CaregartrPeer::COSPRO => 6, CaregartrPeer::EXITOT => 7, CaregartrPeer::UNIMED => 8, CaregartrPeer::UNIALT => 9, CaregartrPeer::RELART => 10, CaregartrPeer::FECULT => 11, CaregartrPeer::INVINI => 12, CaregartrPeer::CODMAR => 13, CaregartrPeer::CODREF => 14, CaregartrPeer::COSTOT => 15, CaregartrPeer::SIGECOF => 16, CaregartrPeer::CODCLAART => 17, CaregartrPeer::LOTUNI => 18, CaregartrPeer::CTAVTA => 19, CaregartrPeer::CTACOS => 20, CaregartrPeer::CTAPRO => 21, CaregartrPeer::PREART => 22, CaregartrPeer::DISTOT => 23, CaregartrPeer::TIPO => 24, CaregartrPeer::TIP0 => 25, CaregartrPeer::CODING => 26, CaregartrPeer::MERCON => 27, CaregartrPeer::ID => 28, ),
		BasePeer::TYPE_FIELDNAME => array ('codart' => 0, 'desart' => 1, 'codcta' => 2, 'codpar' => 3, 'ramart' => 4, 'cosult' => 5, 'cospro' => 6, 'exitot' => 7, 'unimed' => 8, 'unialt' => 9, 'relart' => 10, 'fecult' => 11, 'invini' => 12, 'codmar' => 13, 'codref' => 14, 'costot' => 15, 'sigecof' => 16, 'codclaart' => 17, 'lotuni' => 18, 'ctavta' => 19, 'ctacos' => 20, 'ctapro' => 21, 'preart' => 22, 'distot' => 23, 'tipo' => 24, 'tip0' => 25, 'coding' => 26, 'mercon' => 27, 'id' => 28, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CaregartrMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CaregartrMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CaregartrPeer::getTableMap();
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
		return str_replace(CaregartrPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CaregartrPeer::CODART);

		$criteria->addSelectColumn(CaregartrPeer::DESART);

		$criteria->addSelectColumn(CaregartrPeer::CODCTA);

		$criteria->addSelectColumn(CaregartrPeer::CODPAR);

		$criteria->addSelectColumn(CaregartrPeer::RAMART);

		$criteria->addSelectColumn(CaregartrPeer::COSULT);

		$criteria->addSelectColumn(CaregartrPeer::COSPRO);

		$criteria->addSelectColumn(CaregartrPeer::EXITOT);

		$criteria->addSelectColumn(CaregartrPeer::UNIMED);

		$criteria->addSelectColumn(CaregartrPeer::UNIALT);

		$criteria->addSelectColumn(CaregartrPeer::RELART);

		$criteria->addSelectColumn(CaregartrPeer::FECULT);

		$criteria->addSelectColumn(CaregartrPeer::INVINI);

		$criteria->addSelectColumn(CaregartrPeer::CODMAR);

		$criteria->addSelectColumn(CaregartrPeer::CODREF);

		$criteria->addSelectColumn(CaregartrPeer::COSTOT);

		$criteria->addSelectColumn(CaregartrPeer::SIGECOF);

		$criteria->addSelectColumn(CaregartrPeer::CODCLAART);

		$criteria->addSelectColumn(CaregartrPeer::LOTUNI);

		$criteria->addSelectColumn(CaregartrPeer::CTAVTA);

		$criteria->addSelectColumn(CaregartrPeer::CTACOS);

		$criteria->addSelectColumn(CaregartrPeer::CTAPRO);

		$criteria->addSelectColumn(CaregartrPeer::PREART);

		$criteria->addSelectColumn(CaregartrPeer::DISTOT);

		$criteria->addSelectColumn(CaregartrPeer::TIPO);

		$criteria->addSelectColumn(CaregartrPeer::TIP0);

		$criteria->addSelectColumn(CaregartrPeer::CODING);

		$criteria->addSelectColumn(CaregartrPeer::MERCON);

		$criteria->addSelectColumn(CaregartrPeer::ID);

	}

	const COUNT = 'COUNT(caregartr.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT caregartr.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaregartrPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaregartrPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CaregartrPeer::doSelectRS($criteria, $con);
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
		$objects = CaregartrPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CaregartrPeer::populateObjects(CaregartrPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CaregartrPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CaregartrPeer::getOMClass();
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
		return CaregartrPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CaregartrPeer::ID);
			$selectCriteria->add(CaregartrPeer::ID, $criteria->remove(CaregartrPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CaregartrPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CaregartrPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Caregartr) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CaregartrPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Caregartr $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CaregartrPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CaregartrPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CaregartrPeer::DATABASE_NAME, CaregartrPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CaregartrPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CaregartrPeer::DATABASE_NAME);

		$criteria->add(CaregartrPeer::ID, $pk);


		$v = CaregartrPeer::doSelect($criteria, $con);

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
			$criteria->add(CaregartrPeer::ID, $pks, Criteria::IN);
			$objs = CaregartrPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCaregartrPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CaregartrMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CaregartrMapBuilder');
}
