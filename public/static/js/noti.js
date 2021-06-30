
mde = {
    showNotification: function(from, align) {
    type = [ 'danger'];

    color = Math.floor((Math.random() * 6) + 1);

    $.notify({
      icon: "add_alert",
      message: "Eliminado exitosamente"

    }, {
      type: type[color],
      timer: 3000,
      placement: {
        from: from,
        align: align
      }
    });
  }
}
//"info","danger","success","warning","rose","primary"
md = {
    showNotification2: function(from, align) {
    type = [ 'info'];

    color = Math.floor((Math.random() * 6) + 1);

    $.notify({
      icon: "add_alert",
      message: "SE ACTUALIZO CORRECTAMENTE"

    }, {
      type: type[color],
      timer: 3000,
      placement: {
        from: from,
        align: align
      }
    });
  }
}

mdg = {
    showNotification3: function(from, align) {
    type = [ 'info'];

    color = Math.floor((Math.random() * 6) + 1);

    $.notify({
      icon: "add_alert",
      message: "El rol se ha guardado con exito"

    }, {
      type: type[color],
      timer: 3000,
      placement: {
        from: from,
        align: align
      }
    });
  }
}
