
  function validate()
  {
    
    var Password=document.form.password.value;
    var letter = /[A-Z]/;
    var alphabet=/[a-z]/;
    var number = /[0-9]/;
    if (Password.length < 4 || !letter.test(Password) || !number.test(Password) || !alphabet.test(Password)) {
        document.getElementById('passwordvalidation').innerHTML="Please enter atleast 4 character with number,capital letter and small letter";
        document.getElementById("submit").disabled = true ; 
        return false; 
      
    }
    else
    {
        document.getElementById('passwordvalidation').innerHTML="";
        confirmpasswordvalidate();
        //document.getElementById("submit").disabled = false;  
    }
     return true; 
  
  }
  function confirmpasswordvalidate()
  {
    var firstpassword=document.form.password.value;
    var secondpassword=document.form.cpassword.value;
    
    //document.getElementById('confirmpasswordvalidation').innerHTML=secondpassword;
    //alert(secondpassword);
    if(firstpassword!=secondpassword){  
    document.getElementById('confirmpasswordvalidation').innerHTML="Please enter same password.";
    document.getElementById("submit").disabled = true; 
       return false; 
       //alert("dhh"); 
}  
    
         //document.getElementById('confirmpasswordvalidation').innerHTML="invalid"; 
        //return true;
        else
        {

      document.getElementById('confirmpasswordvalidation').innerHTML="";
      document.getElementById("submit").disabled = false;            
        }
  return true;      
}
function emailvalidate()
{
  var Email=document.form.email.value;
 // document.getElementById('emailvalidation').innerHTML=Email;

   
 var atpos = Email.indexOf("@");
    var dotpos = Email.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=Email.length) {
        //alert("Not a valid e-mail address");
        //if(!re.test(Email)){
        document.getElementById('emailvalidation').innerHTML="please enter valid email";
        document.getElementById("submit").disabled = true;
        return false;
    }
    else
    {
      document.getElementById('emailvalidation').innerHTML="";
      document.getElementById("submit").disabled = false;  
       // return false;
    }
  //if(!re.test(Email)) 
  //{
    //document.getElementById('emailvalidation').innerHTML="invalid email";
    //return false;
  //} 
  //else
  //{
    return true;
    //document.getElementById('emailvalidation').innerHTML="";
  //}
}
function allvalidation()
{
  var FirstName=document.form.fname.value;
  var LastName=document.form.lname.value;
   var Password=document.form.password.value;
  var secondpassword=document.form.cpassword.value;
  var Email=document.form.email.value;
  if(FirstName.length===0 || LastName.length===0 || Password.length===0 || secondpassword.length===0 || Email.length===0)
    {
      if (FirstName.length===0) {
        document.getElementById('firstnamevalidation').innerHTML="Please enter the first name";


      }
      if (LastName.length===0) {
        document.getElementById('lastnamevalidation').innerHTML="Please enter the  last name";

      }
      if (Password.length===0) {
      document.getElementById('passwordvalidation').innerHTML="Please enter the password";
      
    }
    if (secondpassword.length===0) {
     document.getElementById('confirmpasswordvalidation').innerHTML="Please enter the confirmpassword"; 
    }
    if (Email.length===0) { 
    document.getElementById('emailvalidation').innerHTML="Please enter the email";
    }
     return false;
     
    }
  return true;

}
function firstnamevalidate()
{
  var FirstName=document.form.fname.value;
  document.getElementById('firstnamevalidation').innerHTML="";
}
function lastnamevalidate()
{
 var LastName=document.form.lname.value;
  document.getElementById('lastnamevalidation').innerHTML=""; 
}
















