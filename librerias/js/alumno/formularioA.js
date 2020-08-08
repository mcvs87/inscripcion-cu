(function() {

  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();                
        }else {
            event.preventDefault();
           let url = BASE_URL+'alumnos/guardar';
           $.ajax({
           type: "POST",
           url: url,
           data: $("#formAlumno").serialize(), // serializes the form's elements.
           success: function(data)
           {
              document.getElementById("alumnoRegistro").style.display = "none";
              document.getElementById("exito").style.display = "block";
              setTimeout(function() {
                location.reload();
              }, 5000);
           }
         });
        }
        form.classList.add('was-validated');

      }, false);
    });
  }, false);
})();

