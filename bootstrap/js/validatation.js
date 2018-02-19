
	function onlyNos(e, t) 
	{
            try 
			{
                if (window.event) 
				{
                    var charCode = window.event.keyCode;
                }
                else if (e) 
				{
                    var charCode = e.which;
                }
                else 
				{ 
					return true; 
					
				}
                if (charCode > 31 && (charCode < 48 || charCode > 57)) 
				{
                    return false;
                }
                return true;
            }
            catch (err) 
			{
                alert(err.Description);
            }
    }
	
	
	function onlyAlphabets(e, t) 
	{
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
	}
	
	function readURL(input) 
	{
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#pics')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
		
		
	function chk_contact(tmp_id)
		{
			var num = document.getElementById(tmp_id).value;
			 try 
			 {
                var num = document.getElementById(tmp_id).value;
                
				if (num.length == 10)
				{
                    return true;
				}
                else
				{
					alert("Only 10 digits are allowed.");
					document.getElementById(tmp_id).focus();
                    return false;
				}
            }
            catch (err) 
			{
                alert(err.Description);
            }
			
		
		}
	
	
