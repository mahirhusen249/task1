  
//   <!DOCTYPE html>
//   <html lang="en">
//   <head>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <title>Document</title>
// </head>
//   <body> 
//     <link rel="stylesheet" href="register.php">
//      <script>
//         document.getElementById('registrationForm').addEventListener('submit', function(event) {
//             event.preventDefault(); // Prevent form submission
            
//             var emailInput = document.getElementById('email').value;
//             var messageElement = document.getElementById('message');
            
//             // Regular expression for basic email validation
//             var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//             // Array of allowed domain extensions
//              var allowedExtensions = ['com', 'org', 'net', 'edu', 'gov'];
//             // var allowedExtensions = ['com'];
            
//             // Function to get the domain extension from the email
//             function getDomainExtension(email) {
//                 var parts = email.split('.');
//                 return parts.length > 1 ? parts.pop().toLowerCase() : '';
//             }
            
//             // Validate email
//             if (emailPattern.test(emailInput)) {
//                 var domainExtension = getDomainExtension(emailInput);
                
//                 if (allowedExtensions.includes(domainExtension)) {
//                     // messageElement.textContent = 'Email is valid and has an allowed domain extension.';
//                     messageElement.style.color = 'green';
//                 } else {
//                     messageElement.textContent = 'Invalid domain extension. Allowed extensions are: ' + allowedExtensions.join(', ');
//                     messageElement.style.color = 'red';
//                 }
//             } else {
//                 messageElement.textContent = 'Invalid email address format.';
//                 messageElement.style.color = 'red';
//             }
//         });
   
//     </script> 
//     </body>
//     </html>
    