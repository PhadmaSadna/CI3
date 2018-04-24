$(document).ready(function () {
   $("#submitBtn").click(function () {

       var form = $(".b_validation")

       if (form[0].checkValidity() === false) {
           event.preventDefault()
           event.stopPropagation()
       }
       form.addClass('was-validated');
   })
})
