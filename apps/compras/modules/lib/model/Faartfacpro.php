<?php

/**
 * Subclase para representar una fila de la tabla 'faartfacpro'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Faartfacpro extends BaseFaartfacpro
{
    protected $rifpro='';
    protected $check='';
    protected $precioe="0,00";
    protected $estatus2="";

    public function getEstatus()
    {
        if($this->estatus=='')
          $sta='N';
        else
          $sta=$this->estatus;
        return $sta;
    }
    public function afterHydrate()
    {
        if($this->codart!='')
            $this->check=true;
        else
            $this->check=false;

        if (self::getPrecio()!=0)
        {
          $this->precioe=number_format(self::getPrecio(), 2, ',', '.');
        }

        $this->estatus2=self::getEstatus();
    }

    public function getNomots()
    {
      return Herramientas::getX('CEDRIF','Faregots','Nomots',self::getCedrif());
    }

    public function getNompro()
    {
      return Herramientas::getX('RIFPRO','Caprovee','Nompro',self::getRifpro());
    }

    public function getDesprod()
    {
      return Herramientas::getX('CODPROD','Fadefpro','Desprod',self::getCodprod());
    }

}
