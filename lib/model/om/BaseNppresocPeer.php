<?php


abstract class BaseNppresocPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'nppresoc';

	
	const CLASS_DEFAULT = 'lib.model.Nppresoc';

	
	const NUM_COLUMNS = 20;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'nppresoc.CODEMP';

	
	const FECCOR = 'nppresoc.FECCOR';

	
	const FECCAL = 'nppresoc.FECCAL';

	
	const CODCON = 'nppresoc.CODCON';

	
	const DIASER = 'nppresoc.DIASER';

	
	const MESSER = 'nppresoc.MESSER';

	
	const ANOSER = 'nppresoc.ANOSER';

	
	const DIATRA = 'nppresoc.DIATRA';

	
	const MESTRA = 'nppresoc.MESTRA';

	
	const ANOTRA = 'nppresoc.ANOTRA';

	
	const ANTACU = 'nppresoc.ANTACU';

	
	const INTACU = 'nppresoc.INTACU';

	
	const BONTRA = 'nppresoc.BONTRA';

	
	const ADEPRE = 'nppresoc.ADEPRE';

	
	const ADEINT = 'nppresoc.ADEINT';

	
	const MONPRE = 'nppresoc.MONPRE';

	
	const PASREGANT = 'nppresoc.PASREGANT';

	
	const STAPRE = 'nppresoc.STAPRE';

	
	const REGPRE = 'nppresoc.REGPRE';

	
	const ID = 'nppresoc.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Feccor', 'Feccal', 'Codcon', 'Diaser', 'Messer', 'Anoser', 'Diatra', 'Mestra', 'Anotra', 'Antacu', 'Intacu', 'Bontra', 'Adepre', 'Adeint', 'Monpre', 'Pasregant', 'Stapre', 'Regpre', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NppresocPeer::CODEMP, NppresocPeer::FECCOR, NppresocPeer::FECCAL, NppresocPeer::CODCON, NppresocPeer::DIASER, NppresocPeer::MESSER, NppresocPeer::ANOSER, NppresocPeer::DIATRA, NppresocPeer::MESTRA, NppresocPeer::ANOTRA, NppresocPeer::ANTACU, NppresocPeer::INTACU, NppresocPeer::BONTRA, NppresocPeer::ADEPRE, NppresocPeer::ADEINT, NppresocPeer::MONPRE, NppresocPeer::PASREGANT, NppresocPeer::STAPRE, NppresocPeer::REGPRE, NppresocPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'feccor', 'feccal', 'codcon', 'diaser', 'messer', 'anoser', 'diatra', 'mestra', 'anotra', 'antacu', 'intacu', 'bontra', 'adepre', 'adeint', 'monpre', 'pasregant', 'stapre', 'regpre', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Feccor' => 1, 'Feccal' => 2, 'Codcon' => 3, 'Diaser' => 4, 'Messer' => 5, 'Anoser' => 6, 'Diatra' => 7, 'Mestra' => 8, 'Anotra' => 9, 'Antacu' => 10, 'Intacu' => 11, 'Bontra' => 12, 'Adepre' => 13, 'Adeint' => 14, 'Monpre' => 15, 'Pasregant' => 16, 'Stapre' => 17, 'Regpre' => 18, 'Id' => 19, ),
		BasePeer::TYPE_COLNAME => array (NppresocPeer::CODEMP => 0, NppresocPeer::FECCOR => 1, NppresocPeer::FECCAL => 2, NppresocPeer::CODCON => 3, NppresocPeer::DIASER => 4, NppresocPeer::MESSER => 5, NppresocPeer::ANOSER => 6, NppresocPeer::DIATRA => 7, NppresocPeer::MESTRA => 8, NppresocPeer::ANOTRA => 9, NppresocPeer::ANTACU => 10, NppresocPeer::INTACU => 11, NppresocPeer::BONTRA => 12, NppresocPeer::ADEPRE => 13, NppresocPeer::ADEINT => 14, NppresocPeer::MONPRE => 15, NppresocPeer::PASREGANT => 16, NppresocPeer::STAPRE => 17, NppresocPeer::REGPRE => 18, NppresocPeer::ID => 19, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'feccor' => 1, 'feccal' => 2, 'codcon' => 3, 'diaser' => 4, 'messer' => 5, 'anoser' => 6, 'diatra' => 7, 'mestra' => 8, 'anotra' => 9, 'antacu' => 10, 'intacu' => 11, 'bontra' => 12, 'adepre' => 13, 'adeint' => 14, 'monpre' => 15, 'pasregant' => 16, 'stapre' => 17, 'regpre' => 18, 'id' => 19, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NppresocMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NppresocMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NppresocPeer::getTableMap();
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
		return str_replace(NppresocPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NppresocPeer::CODEMP);

		$criteria->addSelectColumn(NppresocPeer::FECCOR);

		$criteria->addSelectColumn(NppresocPeer::FECCAL);

		$criteria->addSelectColumn(NppresocPeer::CODCON);

		$criteria->addSelectColumn(NppresocPeer::DIASER);

		$criteria->addSelectColumn(NppresocPeer::MESSER);

		$criteria->addSelectColumn(NppresocPeer::ANOSER);

		$criteria->addSelectColumn(NppresocPeer::DIATRA);

		$criteria->addSelectColumn(NppresocPeer::MESTRA);

		$criteria->addSelectColumn(NppresocPeer::ANOTRA);

		$criteria->addSelectColumn(NppresocPeer::ANTACU);

		$criteria->addSelectColumn(NppresocPeer::INTACU);

		$criteria->addSelectColumn(NppresocPeer::BONTRA);

		$criteria->addSelectColumn(NppresocPeer::ADEPRE);

		$criteria->addSelectColumn(NppresocPeer::ADEINT);

		$criteria->addSelectColumn(NppresocPeer::MONPRE);

		$criteria->addSelectColumn(NppresocPeer::PASREGANT);

		$criteria->addSelectColumn(NppresocPeer::STAPRE);

		$criteria->addSelectColumn(NppresocPeer::REGPRE);

		$criteria->addSelectColumn(NppresocPeer::ID);

	}

	const COUNT = 'COUNT(nppresoc.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT nppresoc.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NppresocPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NppresocPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NppresocPeer::doSelectRS($criteria, $con);
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
		$objects = NppresocPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NppresocPeer::populateObjects(NppresocPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NppresocPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NppresocPeer::getOMClass();
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
		return NppresocPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NppresocPeer::ID); 

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
			$comparison = $criteria->getComparison(NppresocPeer::ID);
			$selectCriteria->add(NppresocPeer::ID, $criteria->remove(NppresocPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NppresocPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NppresocPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Nppresoc) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NppresocPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Nppresoc $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NppresocPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NppresocPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NppresocPeer::DATABASE_NAME, NppresocPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NppresocPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NppresocPeer::DATABASE_NAME);

		$criteria->add(NppresocPeer::ID, $pk);


		$v = NppresocPeer::doSelect($criteria, $con);

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
			$criteria->add(NppresocPeer::ID, $pks, Criteria::IN);
			$objs = NppresocPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNppresocPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NppresocMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NppresocMapBuilder');
}
