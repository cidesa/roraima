<?php

/**
 * Subclase para representar una fila de la tabla 'npinffam'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Npinffam.php 38281 2010-05-19 21:05:34Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Npinffam extends BaseNpinffam
{
	protected $edafamact=0;
	protected $seghcm=0;
        protected $prinom="";
        protected $segnom="";
        protected $priape="";
        protected $segape="";

 public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
	  if($this->seghcm == 'S' || $this->seghcm == 1)
	    $this->seghcm='S';
	  else
	  	$this->seghcm=0;

      if (self::getFecNac())
      {
	      $sql = "select  Extract(year from age(now(),'" . self::getFecNac() . "')) as edad";
		  if (Herramientas :: BuscarDatos($sql, & $result))
				$this->edafamact=$result[0]['edad'];
      }

      //Primer nombre
      if(strrpos(self::getNomfam(),','))
        {
            $aux=split(',',self::getNomfam());
            if(count($aux)==2)
            {
                    $auxnom=split(' ',trim($aux[1]));
                    $this->prinom=$auxnom[0];
            }else
            {
                    $auxnom=split(' ',self::getNomfam());
                    $this->prinom=count($auxnom)==2 ? $auxnom[1] : (count($auxnom)>2 ? $auxnom[2] : ' ');
            }
        }else
        {
            $auxnom=split(' ',self::getNomfam());
            $this->prinom=count($auxnom)==2 ? $auxnom[1] : (count($auxnom)>2 ? $auxnom[2] : ' ');
        }

        //Segundo Nombre
    	if(strrpos(self::getNomfam(),','))
            {
                $aux=split(',',self::getNomfam());
                if(count($aux)==2)
                {
                    $auxnom=split(' ',trim($aux[1]));
                    if(count($auxnom)>1){
                      $segnom = '';
                      foreach($auxnom as $i => $nom){
                        if($i!=0){
                          $segnom .= $nom.' ';
                        }
                      }
                      $this->segnom=trim($segnom);
                    }else $this->segnom=' ';

                }else
                {
                    $auxnom=split(' ',self::getNomfam());
                    if(count($auxnom)>3){
                      $segnom = '';
                      foreach($auxnom as $i => $nom){
                        if($i>2){
                          $segnom .= $nom.' ';
                        }
                      }
                      $this->segnom=trim($segnom);
                    }else $this->segnom=' ';
                }
            }else
            {
                $auxnom=split(' ',self::getNomfam());
                $this->segnom= count($auxnom)>3 ? $auxnom[3] : ' ';
            }

       //Primer Apellido
    	if(strrpos(self::getNomfam(),','))
        {
            $aux=split(',',self::getNomfam());
            if(count($aux)==2)
            {
                $auxnom=split(' ',trim($aux[0]));
                $this->priape=$auxnom[0];
            }else
            {
                $auxnom=split(' ',self::getNomfam());
                $this->priape=count($auxnom)==2 ? $auxnom[0] : (count($auxnom)>2 ? $auxnom[0] : ' ');
            }
        }else
        {
            $auxnom=split(' ',self::getNomfam());
            $this->priape=count($auxnom)==2 ? $auxnom[0] : (count($auxnom)>2 ? $auxnom[0] : ' ');
        }

      //Segundo apellido
    	if(strrpos(self::getNomfam(),','))
        {
            $aux=split(',',self::getNomfam());
            if(count($aux)==2)
            {
                $auxnom=split(' ',trim($aux[0]));
                $this->segape=count($auxnom)>1 ? $auxnom[1] : ' ';
            }else
            {
                $auxnom=split(' ',self::getNomfam());
                $this->segape=count($auxnom)>2 ? $auxnom[1] : ' ';
            }
        }else
        {
            $auxnom=split(' ',self::getNomfam());
            $this->segape=count($auxnom)>2 ? $auxnom[1] : ' ';
        }

   }
   public function getNomgua()
    {
      return Herramientas::getX('codcon','Npguarde','nomgua',self::getCodgua());
    }
}
