<?php


abstract class BaseCadefartPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cadefart';

	
	const CLASS_DEFAULT = 'lib.model.Cadefart';

	
	const NUM_COLUMNS = 49;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'cadefart.CODEMP';

	
	const LONART = 'cadefart.LONART';

	
	const RUPART = 'cadefart.RUPART';

	
	const FORART = 'cadefart.FORART';

	
	const DESART = 'cadefart.DESART';

	
	const FORUBI = 'cadefart.FORUBI';

	
	const DESUBI = 'cadefart.DESUBI';

	
	const CORREQ = 'cadefart.CORREQ';

	
	const CORORD = 'cadefart.CORORD';

	
	const CORREC = 'cadefart.CORREC';

	
	const CORDES = 'cadefart.CORDES';

	
	const GENERAOP = 'cadefart.GENERAOP';

	
	const ASIPARREC = 'cadefart.ASIPARREC';

	
	const GENERACOM = 'cadefart.GENERACOM';

	
	const MERCON = 'cadefart.MERCON';

	
	const CTADEV = 'cadefart.CTADEV';

	
	const CTAVCO = 'cadefart.CTAVCO';

	
	const UNIVTA = 'cadefart.UNIVTA';

	
	const ARTVEN = 'cadefart.ARTVEN';

	
	const ARTINS = 'cadefart.ARTINS';

	
	const ARTSER = 'cadefart.ARTSER';

	
	const CODALMVEN = 'cadefart.CODALMVEN';

	
	const RECART = 'cadefart.RECART';

	
	const ORDCOM = 'cadefart.ORDCOM';

	
	const REQART = 'cadefart.REQART';

	
	const DPHART = 'cadefart.DPHART';

	
	const ORDSER = 'cadefart.ORDSER';

	
	const TIPIMPREC = 'cadefart.TIPIMPREC';

	
	const ARTVENHAS = 'cadefart.ARTVENHAS';

	
	const CORCOT = 'cadefart.CORCOT';

	
	const SOLART = 'cadefart.SOLART';

	
	const APLICLADES = 'cadefart.APLICLADES';

	
	const SOLCOM = 'cadefart.SOLCOM';

	
	const UNIDAD = 'cadefart.UNIDAD';

	
	const PRCASOPRE = 'cadefart.PRCASOPRE';

	
	const PRCREQAPR = 'cadefart.PRCREQAPR';

	
	const COMASOPRE = 'cadefart.COMASOPRE';

	
	const COMREQAPR = 'cadefart.COMREQAPR';

	
	const ALMCORRE = 'cadefart.ALMCORRE';

	
	const FORSNC = 'cadefart.FORSNC';

	
	const DESSNC = 'cadefart.DESSNC';

	
	const REQREQAPR = 'cadefart.REQREQAPR';

	
	const SOLREQAPR = 'cadefart.SOLREQAPR';

	
	const GENCORART = 'cadefart.GENCORART';

	
	const TIPDOCPRE = 'cadefart.TIPDOCPRE';

	
	const CORNAC = 'cadefart.CORNAC';

	
	const COREXT = 'cadefart.COREXT';

	
	const TIPODOC = 'cadefart.TIPODOC';

	
	const ID = 'cadefart.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Lonart', 'Rupart', 'Forart', 'Desart', 'Forubi', 'Desubi', 'Correq', 'Corord', 'Correc', 'Cordes', 'Generaop', 'Asiparrec', 'Generacom', 'Mercon', 'Ctadev', 'Ctavco', 'Univta', 'Artven', 'Artins', 'Artser', 'Codalmven', 'Recart', 'Ordcom', 'Reqart', 'Dphart', 'Ordser', 'Tipimprec', 'Artvenhas', 'Corcot', 'Solart', 'Apliclades', 'Solcom', 'Unidad', 'Prcasopre', 'Prcreqapr', 'Comasopre', 'Comreqapr', 'Almcorre', 'Forsnc', 'Dessnc', 'Reqreqapr', 'Solreqapr', 'Gencorart', 'Tipdocpre', 'Cornac', 'Corext', 'Tipodoc', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CadefartPeer::CODEMP, CadefartPeer::LONART, CadefartPeer::RUPART, CadefartPeer::FORART, CadefartPeer::DESART, CadefartPeer::FORUBI, CadefartPeer::DESUBI, CadefartPeer::CORREQ, CadefartPeer::CORORD, CadefartPeer::CORREC, CadefartPeer::CORDES, CadefartPeer::GENERAOP, CadefartPeer::ASIPARREC, CadefartPeer::GENERACOM, CadefartPeer::MERCON, CadefartPeer::CTADEV, CadefartPeer::CTAVCO, CadefartPeer::UNIVTA, CadefartPeer::ARTVEN, CadefartPeer::ARTINS, CadefartPeer::ARTSER, CadefartPeer::CODALMVEN, CadefartPeer::RECART, CadefartPeer::ORDCOM, CadefartPeer::REQART, CadefartPeer::DPHART, CadefartPeer::ORDSER, CadefartPeer::TIPIMPREC, CadefartPeer::ARTVENHAS, CadefartPeer::CORCOT, CadefartPeer::SOLART, CadefartPeer::APLICLADES, CadefartPeer::SOLCOM, CadefartPeer::UNIDAD, CadefartPeer::PRCASOPRE, CadefartPeer::PRCREQAPR, CadefartPeer::COMASOPRE, CadefartPeer::COMREQAPR, CadefartPeer::ALMCORRE, CadefartPeer::FORSNC, CadefartPeer::DESSNC, CadefartPeer::REQREQAPR, CadefartPeer::SOLREQAPR, CadefartPeer::GENCORART, CadefartPeer::TIPDOCPRE, CadefartPeer::CORNAC, CadefartPeer::COREXT, CadefartPeer::TIPODOC, CadefartPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'lonart', 'rupart', 'forart', 'desart', 'forubi', 'desubi', 'correq', 'corord', 'correc', 'cordes', 'generaop', 'asiparrec', 'generacom', 'mercon', 'ctadev', 'ctavco', 'univta', 'artven', 'artins', 'artser', 'codalmven', 'recart', 'ordcom', 'reqart', 'dphart', 'ordser', 'tipimprec', 'artvenhas', 'corcot', 'solart', 'apliclades', 'solcom', 'unidad', 'prcasopre', 'prcreqapr', 'comasopre', 'comreqapr', 'almcorre', 'forsnc', 'dessnc', 'reqreqapr', 'solreqapr', 'gencorart', 'tipdocpre', 'cornac', 'corext', 'tipodoc', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Lonart' => 1, 'Rupart' => 2, 'Forart' => 3, 'Desart' => 4, 'Forubi' => 5, 'Desubi' => 6, 'Correq' => 7, 'Corord' => 8, 'Correc' => 9, 'Cordes' => 10, 'Generaop' => 11, 'Asiparrec' => 12, 'Generacom' => 13, 'Mercon' => 14, 'Ctadev' => 15, 'Ctavco' => 16, 'Univta' => 17, 'Artven' => 18, 'Artins' => 19, 'Artser' => 20, 'Codalmven' => 21, 'Recart' => 22, 'Ordcom' => 23, 'Reqart' => 24, 'Dphart' => 25, 'Ordser' => 26, 'Tipimprec' => 27, 'Artvenhas' => 28, 'Corcot' => 29, 'Solart' => 30, 'Apliclades' => 31, 'Solcom' => 32, 'Unidad' => 33, 'Prcasopre' => 34, 'Prcreqapr' => 35, 'Comasopre' => 36, 'Comreqapr' => 37, 'Almcorre' => 38, 'Forsnc' => 39, 'Dessnc' => 40, 'Reqreqapr' => 41, 'Solreqapr' => 42, 'Gencorart' => 43, 'Tipdocpre' => 44, 'Cornac' => 45, 'Corext' => 46, 'Tipodoc' => 47, 'Id' => 48, ),
		BasePeer::TYPE_COLNAME => array (CadefartPeer::CODEMP => 0, CadefartPeer::LONART => 1, CadefartPeer::RUPART => 2, CadefartPeer::FORART => 3, CadefartPeer::DESART => 4, CadefartPeer::FORUBI => 5, CadefartPeer::DESUBI => 6, CadefartPeer::CORREQ => 7, CadefartPeer::CORORD => 8, CadefartPeer::CORREC => 9, CadefartPeer::CORDES => 10, CadefartPeer::GENERAOP => 11, CadefartPeer::ASIPARREC => 12, CadefartPeer::GENERACOM => 13, CadefartPeer::MERCON => 14, CadefartPeer::CTADEV => 15, CadefartPeer::CTAVCO => 16, CadefartPeer::UNIVTA => 17, CadefartPeer::ARTVEN => 18, CadefartPeer::ARTINS => 19, CadefartPeer::ARTSER => 20, CadefartPeer::CODALMVEN => 21, CadefartPeer::RECART => 22, CadefartPeer::ORDCOM => 23, CadefartPeer::REQART => 24, CadefartPeer::DPHART => 25, CadefartPeer::ORDSER => 26, CadefartPeer::TIPIMPREC => 27, CadefartPeer::ARTVENHAS => 28, CadefartPeer::CORCOT => 29, CadefartPeer::SOLART => 30, CadefartPeer::APLICLADES => 31, CadefartPeer::SOLCOM => 32, CadefartPeer::UNIDAD => 33, CadefartPeer::PRCASOPRE => 34, CadefartPeer::PRCREQAPR => 35, CadefartPeer::COMASOPRE => 36, CadefartPeer::COMREQAPR => 37, CadefartPeer::ALMCORRE => 38, CadefartPeer::FORSNC => 39, CadefartPeer::DESSNC => 40, CadefartPeer::REQREQAPR => 41, CadefartPeer::SOLREQAPR => 42, CadefartPeer::GENCORART => 43, CadefartPeer::TIPDOCPRE => 44, CadefartPeer::CORNAC => 45, CadefartPeer::COREXT => 46, CadefartPeer::TIPODOC => 47, CadefartPeer::ID => 48, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'lonart' => 1, 'rupart' => 2, 'forart' => 3, 'desart' => 4, 'forubi' => 5, 'desubi' => 6, 'correq' => 7, 'corord' => 8, 'correc' => 9, 'cordes' => 10, 'generaop' => 11, 'asiparrec' => 12, 'generacom' => 13, 'mercon' => 14, 'ctadev' => 15, 'ctavco' => 16, 'univta' => 17, 'artven' => 18, 'artins' => 19, 'artser' => 20, 'codalmven' => 21, 'recart' => 22, 'ordcom' => 23, 'reqart' => 24, 'dphart' => 25, 'ordser' => 26, 'tipimprec' => 27, 'artvenhas' => 28, 'corcot' => 29, 'solart' => 30, 'apliclades' => 31, 'solcom' => 32, 'unidad' => 33, 'prcasopre' => 34, 'prcreqapr' => 35, 'comasopre' => 36, 'comreqapr' => 37, 'almcorre' => 38, 'forsnc' => 39, 'dessnc' => 40, 'reqreqapr' => 41, 'solreqapr' => 42, 'gencorart' => 43, 'tipdocpre' => 44, 'cornac' => 45, 'corext' => 46, 'tipodoc' => 47, 'id' => 48, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CadefartMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CadefartMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CadefartPeer::getTableMap();
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
		return str_replace(CadefartPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CadefartPeer::CODEMP);

		$criteria->addSelectColumn(CadefartPeer::LONART);

		$criteria->addSelectColumn(CadefartPeer::RUPART);

		$criteria->addSelectColumn(CadefartPeer::FORART);

		$criteria->addSelectColumn(CadefartPeer::DESART);

		$criteria->addSelectColumn(CadefartPeer::FORUBI);

		$criteria->addSelectColumn(CadefartPeer::DESUBI);

		$criteria->addSelectColumn(CadefartPeer::CORREQ);

		$criteria->addSelectColumn(CadefartPeer::CORORD);

		$criteria->addSelectColumn(CadefartPeer::CORREC);

		$criteria->addSelectColumn(CadefartPeer::CORDES);

		$criteria->addSelectColumn(CadefartPeer::GENERAOP);

		$criteria->addSelectColumn(CadefartPeer::ASIPARREC);

		$criteria->addSelectColumn(CadefartPeer::GENERACOM);

		$criteria->addSelectColumn(CadefartPeer::MERCON);

		$criteria->addSelectColumn(CadefartPeer::CTADEV);

		$criteria->addSelectColumn(CadefartPeer::CTAVCO);

		$criteria->addSelectColumn(CadefartPeer::UNIVTA);

		$criteria->addSelectColumn(CadefartPeer::ARTVEN);

		$criteria->addSelectColumn(CadefartPeer::ARTINS);

		$criteria->addSelectColumn(CadefartPeer::ARTSER);

		$criteria->addSelectColumn(CadefartPeer::CODALMVEN);

		$criteria->addSelectColumn(CadefartPeer::RECART);

		$criteria->addSelectColumn(CadefartPeer::ORDCOM);

		$criteria->addSelectColumn(CadefartPeer::REQART);

		$criteria->addSelectColumn(CadefartPeer::DPHART);

		$criteria->addSelectColumn(CadefartPeer::ORDSER);

		$criteria->addSelectColumn(CadefartPeer::TIPIMPREC);

		$criteria->addSelectColumn(CadefartPeer::ARTVENHAS);

		$criteria->addSelectColumn(CadefartPeer::CORCOT);

		$criteria->addSelectColumn(CadefartPeer::SOLART);

		$criteria->addSelectColumn(CadefartPeer::APLICLADES);

		$criteria->addSelectColumn(CadefartPeer::SOLCOM);

		$criteria->addSelectColumn(CadefartPeer::UNIDAD);

		$criteria->addSelectColumn(CadefartPeer::PRCASOPRE);

		$criteria->addSelectColumn(CadefartPeer::PRCREQAPR);

		$criteria->addSelectColumn(CadefartPeer::COMASOPRE);

		$criteria->addSelectColumn(CadefartPeer::COMREQAPR);

		$criteria->addSelectColumn(CadefartPeer::ALMCORRE);

		$criteria->addSelectColumn(CadefartPeer::FORSNC);

		$criteria->addSelectColumn(CadefartPeer::DESSNC);

		$criteria->addSelectColumn(CadefartPeer::REQREQAPR);

		$criteria->addSelectColumn(CadefartPeer::SOLREQAPR);

		$criteria->addSelectColumn(CadefartPeer::GENCORART);

		$criteria->addSelectColumn(CadefartPeer::TIPDOCPRE);

		$criteria->addSelectColumn(CadefartPeer::CORNAC);

		$criteria->addSelectColumn(CadefartPeer::COREXT);

		$criteria->addSelectColumn(CadefartPeer::TIPODOC);

		$criteria->addSelectColumn(CadefartPeer::ID);

	}

	const COUNT = 'COUNT(cadefart.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cadefart.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadefartPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadefartPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CadefartPeer::doSelectRS($criteria, $con);
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
		$objects = CadefartPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CadefartPeer::populateObjects(CadefartPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CadefartPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CadefartPeer::getOMClass();
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
		return CadefartPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CadefartPeer::ID); 

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
			$comparison = $criteria->getComparison(CadefartPeer::ID);
			$selectCriteria->add(CadefartPeer::ID, $criteria->remove(CadefartPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CadefartPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CadefartPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cadefart) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CadefartPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cadefart $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CadefartPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CadefartPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CadefartPeer::DATABASE_NAME, CadefartPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CadefartPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CadefartPeer::DATABASE_NAME);

		$criteria->add(CadefartPeer::ID, $pk);


		$v = CadefartPeer::doSelect($criteria, $con);

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
			$criteria->add(CadefartPeer::ID, $pks, Criteria::IN);
			$objs = CadefartPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCadefartPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CadefartMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CadefartMapBuilder');
}
