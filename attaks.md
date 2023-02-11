1. SQL injection
' or 1=1--

to prevent we us
mysqli_real_escape_string - Escapes special characters in a string for use in an SQL statement

2. cross site scripting
if website allows users to add content users can insert malicious javascript to redirect to other website 

 
// Security check

// 1. cross site scripting attacks
//    e.g. how to attach: <script>window.location="https://www.facebook.com/"</script>
//    prevent: use htmlspecialchars - in converts everything to html entities instead

to prevent

we use htmlspecialchars  whenever we want to output data inserted by user

cc3377ch
3. cross site scripting forgery
attacker can forge http requests to your site

A CSRF attack occurs when a user is tricked into interacting with a page or script on a third-party site that generates a malicious request to your site.
