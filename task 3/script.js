// let pointA = document.getElementById("pointA");
// let pointB = document.getElementById("pointB");
// let error = document.getElementById("error");


// let distance1 = document.getElementById("distance1");

// let address1 = document.getElementById("address1");
// let address2 = document.getElementById("address2");

// let submit = document.getElementById("submitButton");

function submitForm1() {
  var formData = $('#form1').serialize();

  $.ajax({
    type: 'POST',
    url: 'process.php', // Replace with your server-side PHP script URL
    data: formData,
    success: function(response) {
      console.log('Form 1 submitted successfully!');
      console.log(response);
    },
    error: function(xhr, status, error) {
      console.error('Error submitting Form 1:', error);
    }
  });
}

// function submitForm2() {
//   var formData = $('#form2').serialize();

//   $.ajax({
//     type: 'POST',
//     url: 'process-form.php', // Replace with your server-side PHP script URL
//     data: formData,
//     success: function(response) {
//       console.log('Form 2 submitted successfully!');
//       console.log(response);
//     },
//     error: function(xhr, status, error) {
//       console.error('Error submitting Form 2:', error);
//     }
//   });
// }


// Example starter JavaScript for disabling form submissions if there are invalid fields
// (() => {
//   'use strict'

//   // Fetch all the forms we want to apply custom Bootstrap validation styles to
//   const forms = document.querySelectorAll('.needs-validation')

//   // Loop over them and prevent submission
//   Array.from(forms).forEach(form => {
//     form.addEventListener('submit', event => {
//       if (!form.checkValidity()) {
//         event.preventDefault()
//         event.stopPropagation()
//       }else{
//         event.preventDefault()

//         submitForm1();
//         // submitForm2()

//         // console.log(cuisine.value);
//         // console.log(cuisine2.value);
//       }

//       form.classList.add('was-validated')
//     }, false)
//   })
// })()