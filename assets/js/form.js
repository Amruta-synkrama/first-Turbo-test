function isDate(y,m,d)
	{
	var m = m.replace(/^0+/, '');
	var d = d.replace(/^0+/, '');
	var date = new Date(y,m-1,d);
	var convertedDate =
	""+date.getFullYear() + (date.getMonth()+1) + date.getDate();
	var givenDate = "" + y + m + d;
	return ( givenDate == convertedDate);
}

    function isEmpty(fieldValue) {
        return $.trim(fieldValue).length == 0;    
        } 
        
    function isValidState(state) {                                
        var stateList = new Array("AK","AL","AR","AZ","CA","CO","CT","DC",
        "DE","FL","GA","GU","HI","IA","ID","IL","IN","KS","KY","LA","MA",
        "MD","ME","MH","MI","MN","MO","MS","MT","NC","ND","NE","NH","NJ",
        "NM","NV","NY","OH","OK","OR","PA","PR","RI","SC","SD","TN","TX",
        "UT","VA","VT","WA","WI","WV","WY");
        for(var i=0; i < stateList.length; i++) 
            if(stateList[i] == $.trim(state))
                return true;
        return false;
     }  
     
	 function checkRadio(field)
	 {
	   for(var i=0; i < field.length; i++) {
	     if(field[i].checked) 
		return true;
	   }
	   	return false;
	 }
	 function allLetter(inputtxt)  
      {   
      var letters = /^[A-Za-z]+$/;  
      if(inputtxt.value.match(letters))  
      {    
      	return true;  
      }  
      else  
      {   
      	return false;  
      }  
    }     
         
    function isValidEmail(emailAddress) {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
        }                
                   
$(document).ready( function() {
    var errorStatusHandle = $('#message_line');
    var elementHandle = new Array(10);
    elementHandle[0] = $('[name="fname"]');
    elementHandle[1] = $('[name="lname"]');
    elementHandle[2] = $('[name="address1"]');
    elementHandle[3] = $('[name="city"]');
    elementHandle[4] = $('[name="state"]');
    elementHandle[5] = $('[name="zip"]');
    elementHandle[6] = $('[name="area_phone"]');
    elementHandle[7] = $('[name="prefix_phone"]');
    elementHandle[8] = $('[name="phone"]');
    elementHandle[9] = $('[name="email"]');
	elementHandle[10] = $('[name="gender"]');
	elementHandle[12] = $('[name="experience_level"]');
	elementHandle[13] = $('[name="category"]');
	elementHandle[14] = $('[name="mname"]');
    elementHandle[15] = $('[name="month"]');
    elementHandle[16] = $('[name="date"]');
    elementHandle[17] = $('[name="year"]');
         
    function isValidData() {
        if(isEmpty(elementHandle[0].val())) {
            elementHandle[0].addClass("error");
            errorStatusHandle.text("Please enter your first name");
            elementHandle[0].focus();
            return false;
         }

        if(isEmpty(elementHandle[1].val())) {
            elementHandle[1].addClass("error");
            errorStatusHandle.text("Please enter your last name");
            elementHandle[1].focus();            
            return false;
            }
			
        if(isEmpty(elementHandle[2].val())) {
            elementHandle[2].addClass("error");
            errorStatusHandle.text("Please enter your address");
            elementHandle[2].focus();            
            return false;
            }
        if(isEmpty(elementHandle[3].val())) {
            elementHandle[3].addClass("error");
            errorStatusHandle.text("Please enter your city");
            elementHandle[3].focus();            
            return false;
            }

        if(isEmpty(elementHandle[4].val())) {
            elementHandle[4].addClass("error");
            errorStatusHandle.text("Please enter your state");
            elementHandle[4].focus();            
            return false;
            }
        if(!isValidState(elementHandle[4].val())) {
            elementHandle[4].addClass("error");
            errorStatusHandle.text("The state appears to be invalid, "+
            "please use the two letter state abbreviation");
            elementHandle[4].focus();            
            return false;
            }
        if(isEmpty(elementHandle[5].val())) {
            elementHandle[5].addClass("error");
            errorStatusHandle.text("Please enter your zip code");
            elementHandle[5].focus();            
            return false;
            }
        if(!$.isNumeric(elementHandle[5].val())) {
            elementHandle[5].addClass("error");
            errorStatusHandle.text("The zip code appears to be invalid, "+
            "numbers only please. ");
            elementHandle[5].focus();            
            return false;
            }
        if(elementHandle[5].val().length != 5) {
            elementHandle[5].addClass("error");
            errorStatusHandle.text("The zip code must have exactly five digits")
            elementHandle[5].focus();            
            return false;
            }
        if(isEmpty(elementHandle[6].val())) {
            elementHandle[6].addClass("error");
            errorStatusHandle.text("Please enter your area code");
            elementHandle[6].focus();            
            return false;
            }            
        if(!$.isNumeric(elementHandle[6].val())) {
            elementHandle[6].addClass("error");
            errorStatusHandle.text("The area code appears to be invalid, "+
            "numbers only please. ");
            elementHandle[6].focus();            
            return false;
            }
        if(elementHandle[6].val().length != 3) {
            elementHandle[6].addClass("error");
            errorStatusHandle.text("The area code must have exactly three digits")
            elementHandle[6].focus();            
            return false;
            }   
        if(isEmpty(elementHandle[7].val())) {
            elementHandle[7].addClass("error");
            errorStatusHandle.text("Please enter your phone number prefix");
            elementHandle[7].focus();            
            return false;
            }           
        if(!$.isNumeric(elementHandle[7].val())) {
            elementHandle[7].addClass("error");
            errorStatusHandle.text("The phone number prefix appears to be invalid, "+
            "numbers only please. ");
            elementHandle[7].focus();            
            return false;
            }
        if(elementHandle[7].val().length != 3) {
            elementHandle[7].addClass("error");
            errorStatusHandle.text("The phone number prefix must have exactly three digits")
            elementHandle[7].focus();            
            return false;
            }
        if(isEmpty(elementHandle[8].val())) {
            elementHandle[8].addClass("error");
            errorStatusHandle.text("Please enter your phone number");
            elementHandle[8].focus();            
            return false;
            }            
        if(!$.isNumeric(elementHandle[8].val())) {
            elementHandle[8].addClass("error");
            errorStatusHandle.text("The phone number appears to be invalid, "+
            "numbers only please. ");
            elementHandle[8].focus();            
            return false;
            }
        if(elementHandle[8].val().length != 4) {
            elementHandle[8].addClass("error");
            errorStatusHandle.text("The phone number must have exactly four digits")
            elementHandle[8].focus();            
            return false;
            }  
        if(isEmpty(elementHandle[9].val())) {
            elementHandle[9].addClass("error");
            errorStatusHandle.text("Please enter your email address");
            elementHandle[9].focus();            
            return false;
            }            
        if(!isValidEmail(elementHandle[9].val())) {
            elementHandle[9].addClass("error");
            errorStatusHandle.text("The email address appears to be invalid,");
            elementHandle[9].focus();            
            return false;
       	}
	    if(!checkRadio(elementHandle[10])) {
            elementHandle[10].addClass("error");
            errorStatusHandle.text("Please enter your gender"); 
			return false;
	       }
	    if(!checkRadio(elementHandle[12])) {
            elementHandle[12].addClass("error");
            errorStatusHandle.text("Please enter your Experience Level"); 
			return false;
	      }
  	    if(!checkRadio(elementHandle[13])) {
              elementHandle[13].addClass("error");
              errorStatusHandle.text("Please enter your Category"); 
  			return false;
  	      }
          if(isEmpty(elementHandle[15].val())) {
              elementHandle[15].addClass("error");
              errorStatusHandle.text("Please enter month");
              elementHandle[15].focus();            
              return false;
              }            
          if(!$.isNumeric(elementHandle[15].val())) {
              elementHandle[15].addClass("error");
              errorStatusHandle.text("The month appears to be invalid, "+
              "numbers only please. ");
              elementHandle[15].focus();            
              return false;
              }
          if(elementHandle[15].val().length != 2) {
              elementHandle[15].addClass("error");
              errorStatusHandle.text("The month must have exactly two digits")
              elementHandle[15].focus();            
              return false;
              }   
          if(isEmpty(elementHandle[16].val())) {
              elementHandle[16].addClass("error");
              errorStatusHandle.text("Please enter day");
              elementHandle[16].focus();            
              return false;
              }           
          if(!$.isNumeric(elementHandle[16].val())) {
              elementHandle[16].addClass("error");
              errorStatusHandle.text("The day appears to be invalid, "+
              "numbers only please. ");
              elementHandle[16].focus();            
              return false;
              }
          if(elementHandle[16].val().length != 2) {
              elementHandle[16].addClass("error");
              errorStatusHandle.text("The day must have exactly two digits")
              elementHandle[16].focus();            
              return false;
              }
          if(isEmpty(elementHandle[17].val())) {
              elementHandle[17].addClass("error");
              errorStatusHandle.text("Please enter year");
              elementHandle[17].focus();            
              return false;
              }            
          if(!$.isNumeric(elementHandle[17].val())) {
              elementHandle[17].addClass("error");
              errorStatusHandle.text("The year appears to be invalid, "+
              "numbers only please. ");
              elementHandle[17].focus();            
              return false;
              }
          if(elementHandle[17].val().length != 4) {
              elementHandle[17].addClass("error");
              errorStatusHandle.text("The year must have exactly four digits")
              elementHandle[17].focus();            
              return false;
          }
		  if(!isDate(elementHandle[17].val(),elementHandle[15].val(),elementHandle[16].val())) {
              elementHandle[17].addClass("error");
              errorStatusHandle.text("This date does not exist. Invalid date")
              elementHandle[15].focus(); 
			  return false;
		  }
		  
		  if (elementHandle[17].val() >= 2014) {
              elementHandle[17].addClass("error");
              errorStatusHandle.text("People who born after 2014 are only allowed for this marathon.")
              elementHandle[17].focus(); 
			  return false;
		  }
		  
		  if (elementHandle[17].val() <= 1916) {
              elementHandle[17].addClass("error");
              errorStatusHandle.text("People who born before 1916 are not allowed for this marathon.")
              elementHandle[17].focus(); 
			  return false;
		  }
		  	 																		 
        return true;
        }       

   elementHandle[0].focus();
   
   
/////// HANDLERS

// on blur, if the user has entered valid data, the error message
// should no longer show.
    elementHandle[0].on('blur', function() {
        if(isEmpty(elementHandle[0].val()))
            return;
        $(this).removeClass("error");
        errorStatusHandle.text("");
        });
        
    elementHandle[9].on('blur', function() {
        if(isEmpty(elementHandle[9].val()))
            return;
        if(isValidEmail(elementHandle[9].val())) {
            $(this).removeClass("error");
            errorStatusHandle.text("");
            }
        });        
/////////////////////////////////////////////////////////////////        

    elementHandle[4].on('keyup', function() {
        elementHandle[4].val(elementHandle[4].val().toUpperCase());
        });
        
    elementHandle[6].on('keyup', function() {
        if(elementHandle[6].val().length == 3)
            elementHandle[7].focus();
            });
            
    elementHandle[7].on('keyup', function() {
        if(elementHandle[7].val().length == 3)
            elementHandle[8].focus();
            });            

   
    $(':submit').on('click', function() {
        for(var i=0; i < 10; i++)
            elementHandle[i].removeClass("error");
        errorStatusHandle.text("");
        return isValidData();
        });
        
    $(':reset').on('click', function() {
        for(var i=0; i < 10; i++)
            elementHandle[i].removeClass("error");
        errorStatusHandle.text("");
        });                                       
});