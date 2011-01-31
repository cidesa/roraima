<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'cadetent'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class CadetentPeer extends BaseCadetentPeer
{
	
		private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Número', 'Código Artículo', 'Canrec', 'Monto Total', 'Cosart', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CadetentPeer::RCPART, CadetentPeer::CODART, CadetentPeer::CANREC, CadetentPeer::MONTOT, CadetentPeer::COSART, CadetentPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('rcpart', 'codart', 'canrec', 'montot', 'cosart', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);
	
}
