<?php


abstract class BaseCaordcomPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'caordcom';

	
	const CLASS_DEFAULT = 'lib.model.Caordcom';

	
	const NUM_COLUMNS = 32;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ORDCOM = 'caordcom.ORDCOM';

	
	const FECORD = 'caordcom.FECORD';

	
	const CODPRO = 'caordcom.CODPRO';

	
	const DESORD = 'caordcom.DESORD';

	
	const CRECON = 'caordcom.CRECON';

	
	const PLAENT = 'caordcom.PLAENT';

	
	const TIECAN = 'caordcom.TIECAN';

	
	const MONORD = 'caordcom.MONORD';

	
	const DTOORD = 'caordcom.DTOORD';

	
	const REFCOM = 'caordcom.REFCOM';

	
	const STAORD = 'caordcom.STAORD';

	
	const AFEPRE = 'caordcom.AFEPRE';

	
	const CONPAG = 'caordcom.CONPAG';

	
	const FORENT = 'caordcom.FORENT';

	
	const FECANU = 'caordcom.FECANU';

	
	const TIPMON = 'caordcom.TIPMON';

	
	const VALMON = 'caordcom.VALMON';

	
	const TIPCOM = 'caordcom.TIPCOM';

	
	const TIPORD = 'caordcom.TIPORD';

	
	const TIPO = 'caordcom.TIPO';

	
	const CODUNI = 'caordcom.CODUNI';

	
	const CODEMP = 'caordcom.CODEMP';

	
	const NOTORD = 'caordcom.NOTORD';

	
	const TIPDOC = 'caordcom.TIPDOC';

	
	const TIPPRO = 'caordcom.TIPPRO';

	
	const AFEPRO = 'caordcom.AFEPRO';

	
	const DOCCOM = 'caordcom.DOCCOM';

	
	const REFSOL = 'caordcom.REFSOL';

	
	const TIPFIN = 'caordcom.TIPFIN';

	
	const JUSTIF = 'caordcom.JUSTIF';

	
	const REFPRC = 'caordcom.REFPRC';

	
	const ID = 'caordcom.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Ordcom', 'Fecord', 'Codpro', 'Desord', 'Crecon', 'Plaent', 'Tiecan', 'Monord', 'Dtoord', 'Refcom', 'Staord', 'Afepre', 'Conpag', 'Forent', 'Fecanu', 'Tipmon', 'Valmon', 'Tipcom', 'Tipord', 'Tipo', 'Coduni', 'Codemp', 'Notord', 'Tipdoc', 'Tippro', 'Afepro', 'Doccom', 'Refsol', 'Tipfin', 'Justif', 'Refprc', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CaordcomPeer::ORDCOM, CaordcomPeer::FECORD, CaordcomPeer::CODPRO, CaordcomPeer::DESORD, CaordcomPeer::CRECON, CaordcomPeer::PLAENT, CaordcomPeer::TIECAN, CaordcomPeer::MONORD, CaordcomPeer::DTOORD, CaordcomPeer::REFCOM, CaordcomPeer::STAORD, CaordcomPeer::AFEPRE, CaordcomPeer::CONPAG, CaordcomPeer::FORENT, CaordcomPeer::FECANU, CaordcomPeer::TIPMON, CaordcomPeer::VALMON, CaordcomPeer::TIPCOM, CaordcomPeer::TIPORD, CaordcomPeer::TIPO, CaordcomPeer::CODUNI, CaordcomPeer::CODEMP, CaordcomPeer::NOTORD, CaordcomPeer::TIPDOC, CaordcomPeer::TIPPRO, CaordcomPeer::AFEPRO, CaordcomPeer::DOCCOM, CaordcomPeer::REFSOL, CaordcomPeer::TIPFIN, CaordcomPeer::JUSTIF, CaordcomPeer::REFPRC, CaordcomPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('ordcom', 'fecord', 'codpro', 'desord', 'crecon', 'plaent', 'tiecan', 'monord', 'dtoord', 'refcom', 'staord', 'afepre', 'conpag', 'forent', 'fecanu', 'tipmon', 'valmon', 'tipcom', 'tipord', 'tipo', 'coduni', 'codemp', 'notord', 'tipdoc', 'tippro', 'afepro', 'doccom', 'refsol', 'tipfin', 'justif', 'refprc', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Ordcom' => 0, 'Fecord' => 1, 'Codpro' => 2, 'Desord' => 3, 'Crecon' => 4, 'Plaent' => 5, 'Tiecan' => 6, 'Monord' => 7, 'Dtoord' => 8, 'Refcom' => 9, 'Staord' => 10, 'Afepre' => 11, 'Conpag' => 12, 'Forent' => 13, 'Fecanu' => 14, 'Tipmon' => 15, 'Valmon' => 16, 'Tipcom' => 17, 'Tipord' => 18, 'Tipo' => 19, 'Coduni' => 20, 'Codemp' => 21, 'Notord' => 22, 'Tipdoc' => 23, 'Tippro' => 24, 'Afepro' => 25, 'Doccom' => 26, 'Refsol' => 27, 'Tipfin' => 28, 'Justif' => 29, 'Refprc' => 30, 'Id' => 31, ),
		BasePeer::TYPE_COLNAME => array (CaordcomPeer::ORDCOM => 0, CaordcomPeer::FECORD => 1, CaordcomPeer::CODPRO => 2, CaordcomPeer::DESORD => 3, CaordcomPeer::CRECON => 4, CaordcomPeer::PLAENT => 5, CaordcomPeer::TIECAN => 6, CaordcomPeer::MONORD => 7, CaordcomPeer::DTOORD => 8, CaordcomPeer::REFCOM => 9, CaordcomPeer::STAORD => 10, CaordcomPeer::AFEPRE => 11, CaordcomPeer::CONPAG => 12, CaordcomPeer::FORENT => 13, CaordcomPeer::FECANU => 14, CaordcomPeer::TIPMON => 15, CaordcomPeer::VALMON => 16, CaordcomPeer::TIPCOM => 17, CaordcomPeer::TIPORD => 18, CaordcomPeer::TIPO => 19, CaordcomPeer::CODUNI => 20, CaordcomPeer::CODEMP => 21, CaordcomPeer::NOTORD => 22, CaordcomPeer::TIPDOC => 23, CaordcomPeer::TIPPRO => 24, CaordcomPeer::AFEPRO => 25, CaordcomPeer::DOCCOM => 26, CaordcomPeer::REFSOL => 27, CaordcomPeer::TIPFIN => 28, CaordcomPeer::JUSTIF => 29, CaordcomPeer::REFPRC => 30, CaordcomPeer::ID => 31, ),
		BasePeer::TYPE_FIELDNAME => array ('ordcom' => 0, 'fecord' => 1, 'codpro' => 2, 'desord' => 3, 'crecon' => 4, 'plaent' => 5, 'tiecan' => 6, 'monord' => 7, 'dtoord' => 8, 'refcom' => 9, 'staord' => 10, 'afepre' => 11, 'conpag' => 12, 'forent' => 13, 'fecanu' => 14, 'tipmon' => 15, 'valmon' => 16, 'tipcom' => 17, 'tipord' => 18, 'tipo' => 19, 'coduni' => 20, 'codemp' => 21, 'notord' => 22, 'tipdoc' => 23, 'tippro' => 24, 'afepro' => 25, 'doccom' => 26, 'refsol' => 27, 'tipfin' => 28, 'justif' => 29, 'refprc' => 30, 'id' => 31, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CaordcomMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CaordcomMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CaordcomPeer::getTableMap();
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
		return str_replace(CaordcomPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CaordcomPeer::ORDCOM);

		$criteria->addSelectColumn(CaordcomPeer::FECORD);

		$criteria->addSelectColumn(CaordcomPeer::CODPRO);

		$criteria->addSelectColumn(CaordcomPeer::DESORD);

		$criteria->addSelectColumn(CaordcomPeer::CRECON);

		$criteria->addSelectColumn(CaordcomPeer::PLAENT);

		$criteria->addSelectColumn(CaordcomPeer::TIECAN);

		$criteria->addSelectColumn(CaordcomPeer::MONORD);

		$criteria->addSelectColumn(CaordcomPeer::DTOORD);

		$criteria->addSelectColumn(CaordcomPeer::REFCOM);

		$criteria->addSelectColumn(CaordcomPeer::STAORD);

		$criteria->addSelectColumn(CaordcomPeer::AFEPRE);

		$criteria->addSelectColumn(CaordcomPeer::CONPAG);

		$criteria->addSelectColumn(CaordcomPeer::FORENT);

		$criteria->addSelectColumn(CaordcomPeer::FECANU);

		$criteria->addSelectColumn(CaordcomPeer::TIPMON);

		$criteria->addSelectColumn(CaordcomPeer::VALMON);

		$criteria->addSelectColumn(CaordcomPeer::TIPCOM);

		$criteria->addSelectColumn(CaordcomPeer::TIPORD);

		$criteria->addSelectColumn(CaordcomPeer::TIPO);

		$criteria->addSelectColumn(CaordcomPeer::CODUNI);

		$criteria->addSelectColumn(CaordcomPeer::CODEMP);

		$criteria->addSelectColumn(CaordcomPeer::NOTORD);

		$criteria->addSelectColumn(CaordcomPeer::TIPDOC);

		$criteria->addSelectColumn(CaordcomPeer::TIPPRO);

		$criteria->addSelectColumn(CaordcomPeer::AFEPRO);

		$criteria->addSelectColumn(CaordcomPeer::DOCCOM);

		$criteria->addSelectColumn(CaordcomPeer::REFSOL);

		$criteria->addSelectColumn(CaordcomPeer::TIPFIN);

		$criteria->addSelectColumn(CaordcomPeer::JUSTIF);

		$criteria->addSelectColumn(CaordcomPeer::REFPRC);

		$criteria->addSelectColumn(CaordcomPeer::ID);

	}

	const COUNT = 'COUNT(caordcom.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT caordcom.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaordcomPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaordcomPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CaordcomPeer::doSelectRS($criteria, $con);
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
		$objects = CaordcomPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CaordcomPeer::populateObjects(CaordcomPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CaordcomPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CaordcomPeer::getOMClass();
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
		return CaordcomPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CaordcomPeer::ID);
			$selectCriteria->add(CaordcomPeer::ID, $criteria->remove(CaordcomPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CaordcomPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CaordcomPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Caordcom) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CaordcomPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Caordcom $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CaordcomPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CaordcomPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CaordcomPeer::DATABASE_NAME, CaordcomPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CaordcomPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CaordcomPeer::DATABASE_NAME);

		$criteria->add(CaordcomPeer::ID, $pk);


		$v = CaordcomPeer::doSelect($criteria, $con);

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
			$criteria->add(CaordcomPeer::ID, $pks, Criteria::IN);
			$objs = CaordcomPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCaordcomPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CaordcomMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CaordcomMapBuilder');
}
