<?php

/**
 * Subclass for representing a row from the 'npcatpre' table.
 *
 *
 *
 * @package lib.model
 */
class Npcatpre extends BaseNpcatpre
{
	public function getNomcatnew()
    {
      return self::getNomcat();
    }

    public function getCodcatnew()
    {
      return self::getCodcat();
    }
}
