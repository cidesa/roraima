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

  function num(e)
  {
      evt = e ? e : event;
      tcl = (window.Event) ? evt.which : evt.keyCode;
      if ((tcl < 48 || tcl > 57))
      {
          return false;
      }
     return true;
  }