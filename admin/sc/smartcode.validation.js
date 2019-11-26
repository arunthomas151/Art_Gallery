
/*! jQuery v1.11.3 | (c) 2005, 2015 jQuery Foundation, Inc. | jquery.org/license */


function isEmpty(passvalue) 
{
  if(passvalue.length==0)
    {
     return true;
    }
  else
   {
     return false;
   }
}

function isAlphabet(passvalue) 
{
 var letters = /^[A-Za-z]+$/;
 if(passvalue.match(letters))
    {
     return true;
    }
  else
   {
    return false;
   }
}

function isNumber(passvalue) 
{
  var numbers = /^[0-9]+$/;
 if(passvalue.match(numbers))
    {
     return true;
    }
  else
   {
    return false;
   }
}

function isEmail(passvalue) 
{
 var email = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
if (email.test(passvalue))
{
 return true; 
}
 else
{
 return false;
 }
 
}
function isUrl() 
{
 
}
function isStrongPassword(passvalue)
{
   var s_password = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
   if(passvalue.match(s_password))
    {
     return true;
    }
   else
   {
    return false;
   }
}
function isPhoneIndia(passvalue)
{
 var phoneno = /^\d{10}$/;
 if(passvalue.match(phoneno))
    {
     return true;
    }
  else
   {
    return false;
   }
}
function findLength(passvalue,min,max)
{
  if(passvalue.length<=max && passvalue.length>min)
    {
     return true;
    }
  else
   {
     return false;
   }

}

function dropdownvalidation(dropdownid,displayid)
{
    var drop=$('#'+dropdownid);
    var dropindex=$(drop).prop('selectedIndex');
    var errormsg=$(drop).attr('data-error');
    var display=$('#'+displayid);
    if(dropindex==0)
    {
      display.text(errormsg);exit();
    }
  return true;
}


function inputvalidation(formid,displayid)
  {
    
     $('#'+formid+' input').each(function(index)
        {  
              var display=$('#'+displayid);
              var errormsg=$(this).attr('data-error');
              var input = $(this);

              $(display).css("color", "red");
              if(input.attr('data-sc-type')=="text")
              {
                  if(isEmpty(input.val())){display.text(errormsg);exit();} 
              }
              else if(input.attr('data-sc-type')=="email")
              {
                  if(!isEmail(input.val())){display.text(errormsg);exit();}
              }
              else if(input.attr('data-sc-type')=="date")
              {
                  if(isEmpty(input.val())){display.text(errormsg);exit();}
              }
             else if(input.attr('data-sc-type')=="tel")
              {
                  if(!isPhoneIndia(input.val())){display.text(errormsg);exit();}
              }
              else if(input.attr('data-sc-type')=="strong-password")
              {
                  if(!isStrongPassword(input.val())){display.text(errormsg);exit();}
              }
              else if(input.attr('data-sc-type')=="password")
              {
                  var min=$(this).data("min");var max=$(this).data("max");
                  if(!findLength(input.val(),min,max)){display.text(errormsg);exit();}
              }

      });




     return true;

  }




