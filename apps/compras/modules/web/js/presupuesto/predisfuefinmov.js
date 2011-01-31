/**
 * Librerías Javascript
 *
 * @package    Roraima
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */

  function actualizarsaldos(id)
   {
	  var name = id[0];
	  var fil  = id[3];
	  var id1  = name+"x_"+fil+"_"+'4';       //Monto
	  var i    = 0;
	  var acum = 0;
	  if ($(id1)){
	  	  while ((i <= 10000) && $(id1))
		  {
			  if (($F(id1)!='') && ($F(id1)!=0) ) {
				id1 = name+"x_"+i+"_"+'4';       //Monto
				num  = toFloat($(id1));
	   		    acum = acum + num;
			  }
			  i = i + 1;
	      }
      }
	$('cpmovfuefin_monmov').value = FloattoFloatVE(acum);
	$(id).value = FloattoFloatVE($F(id));
	}


  function actualizarsaldosTotal()
   {
	  var name = 'a';
	  var id1  = 'ax_0_4';       //Monto
	  var i    = 0;
	  var acum = 0;
	  if ($(id1)){
	  	  while ((i <= 10000) && $(id1))
		  {
			  if (($F(id1)!='') && ($F(id1)!=0) ) {
				id1 = name+"x_"+i+"_"+'4';       //Monto
				num  = toFloat($(id1));
	   		    acum = acum + num;
			  }
			  i = i + 1;
	      }
      }
	$('cpmovfuefin_monmov').value = FloattoFloatVE(acum);
	}