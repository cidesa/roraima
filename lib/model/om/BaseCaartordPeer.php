<?php


abstract class BaseCaartordPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'caartord';

	
	const CLASS_DEFAULT = 'lib.model.Caartord';

	
	const NUM_COLUMNS = 20;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ORDCOM = 'caartord.ORDCOM';

	
	const CODART = 'caartord.CODART';

	
	const CODCAT = 'caartord.CODCAT';

	
	const CANORD = 'caartord.CANORD';

	
	const CANAJU = 'caartord.CANAJU';

	
	const CANREC = 'caartord.CANREC';

	
	const CANTOT = 'caartord.CANTOT';

	
	const PREART = 'caartord.PREART';

	
	const DTOART = 'caartord.DTOART';

	
	const CODRGO = 'caartord.CODRGO';

	
	const CERART = 'caartord.CERART';

	
	const RGOART = 'caartord.RGOART';

	
	const TOTART = 'caartord.TOTART';

	
	const FECENT = 'caartord.FECENT';

	
	const DESART = 'caartord.DESART';

	
	const RELART = 'caartord.RELART';

	
	const UNIMED = 'caartord.UNIMED';

	
	const CODPAR = 'caartord.CODPAR';

	
	const PARTIDA = 'caartord.PARTIDA';

	
	const ID = 'caartord.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Ordcom', 'Codart', 'Codcat', 'Canord', 'Canaju', 'Canrec', 'Cantot', 'Preart', 'Dtoart', 'Codrgo', 'Cerart', 'Rgoart', 'Totart', 'Fecent', 'Desart', 'Relart', 'Unimed', 'Codpar', 'Partida', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CaartordPeer::ORDCOM, CaartordPeer::CODART, CaartordPeer::CODCAT, CaartordPeer::CANORD, CaartordPeer::CANAJU, CaartordPeer::CANREC, CaartordPeer::CANTOT, CaartordPeer::PREART, CaartordPeer::DTOART, CaartordPeer::CODRGO, CaartordPeer::CERART, CaartordPeer::RGOART, CaartordPeer::TOTART, CaartordPeer::FECENT, CaartordPeer::DESART, CaartordPeer::RELART, CaartordPeer::UNIMED, CaartordPeer::CODPAR, CaartordPeer::PARTIDA, CaartordPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('ordcom', 'codart', 'codcat', 'canord', 'canaju', 'canrec', 'cantot', 'preart', 'dtoart', 'codrgo', 'cerart', 'rgoart', 'totart', 'fecent', 'desart', 'relart', 'unimed', 'codpar', 'partida', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Ordcom' => 0, 'Codart' => 1, 'Codcat' => 2, 'Canord' => 3, 'Canaju' => 4, 'Canrec' => 5, 'Cantot' => 6, 'Preart' => 7, 'Dtoart' => 8, 'Codrgo' => 9, 'Cerart' => 10, 'Rgoart' => 11, 'Totart' => 12, 'Fecent' => 13, 'Desart' => 14, 'Relart' => 15, 'Unimed' => 16, 'Codpar' => 17, 'Partida' => 18, 'Id' => 19, ),
		BasePeer::TYPE_COLNAME => array (CaartordPeer::ORDCOM => 0, CaartordPeer::CODART => 1, CaartordPeer::CODCAT => 2, CaartordPeer::CANORD => 3, CaartordPeer::CANAJU => 4, CaartordPeer::CANREC => 5, CaartordPeer::CANTOT => 6, CaartordPeer::PREART => 7, CaartordPeer::DTOART => 8, CaartordPeer::CODRGO => 9, CaartordPeer::CERART => 10, CaartordPeer::RGOART => 11, CaartordPeer::TOTART => 12, CaartordPeer::FECENT => 13, CaartordPeer::DESART => 14, CaartordPeer::RELART => 15, CaartordPeer::UNIMED => 16, CaartordPeer::CODPAR => 17, CaartordPeer::PARTIDA => 18, CaartordPeer::ID => 19, ),
		BasePeer::TYPE_FIELDNAME => array ('ordcom' => 0, 'codart' => 1, 'codcat' => 2, 'canord' => 3, 'canaju' => 4, 'canrec' => 5, 'cantot' => 6, 'preart' => 7, 'dtoart' => 8, 'codrgo' => 9, 'cerart' => 10, 'rgoart' => 11, 'totart' => 12, 'fecent' => 13, 'desart' => 14, 'relart' => 15, 'unimed' => 16, 'codpar' => 17, 'partida' => 18, 'id' => 19, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CaartordMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CaartordMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CaartordPeer::getTableMap();
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
		return str_replace(CaartordPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CaartordPeer::ORDCOM);

		$criteria->addSelectColumn(CaartordPeer::CODART);

		$criteria->addSelectColumn(CaartordPeer::CODCAT);

		$criteria->addSelectColumn(CaartordPeer::CANORD);

		$criteria->addSelectColumn(CaartordPeer::CANAJU);

		$criteria->addSelectColumn(CaartordPeer::CANREC);

		$criteria->addSelectColumn(CaartordPeer::CANTOT);

		$criteria->addSelectColumn(CaartordPeer::PREART);

		$criteria->addSelectColumn(CaartordPeer::DTOART);

		$criteria->addSelectColumn(CaartordPeer::CODRGO);

		$criteria->addSelectColumn(CaartordPeer::CERART);

		$criteria->addSelectColumn(CaartordPeer::RGOART);

		$criteria->addSelectColumn(CaartordPeer::TOTART);

		$criteria->addSelectColumn(CaartordPeer::FECENT);

		$criteria->addSelectColumn(CaartordPeer::DESART);

		$criteria->addSelectColumn(CaartordPeer::RELART);

		$criteria->addSelectColumn(CaartordPeer::UNIMED);

		$criteria->addSelectColumn(CaartordPeer::CODPAR);

		$criteria->addSelectColumn(CaartordPeer::PARTIDA);

		$criteria->addSelectColumn(CaartordPeer::ID);

	}

	const COUNT = 'COUNT(caartord.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT caartord.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaartordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaartordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CaartordPeer::doSelectRS($criteria, $con);
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
		$objects = CaartordPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CaartordPeer::populateObjects(CaartordPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CaartordPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CaartordPeer::getOMClass();
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
		return CaartordPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CaartordPeer::ID); 

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
			$comparison = $criteria->getComparison(CaartordPeer::ID);
			$selectCriteria->add(CaartordPeer::ID, $criteria->remove(CaartordPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CaartordPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CaartordPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Caartord) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CaartordPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Caartord $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CaartordPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CaartordPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CaartordPeer::DATABASE_NAME, CaartordPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CaartordPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CaartordPeer::DATABASE_NAME);

		$criteria->add(CaartordPeer::ID, $pk);


		$v = CaartordPeer::doSelect($criteria, $con);

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
			$criteria->add(CaartordPeer::ID, $pks, Criteria::IN);
			$objs = CaartordPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCaartordPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CaartordMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CaartordMapBuilder');
}
