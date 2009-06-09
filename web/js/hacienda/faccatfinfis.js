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