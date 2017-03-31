/****** test email******/

$(document).ready(function(){

		$("#contact_us").fancybox({
			type:"inline",
			closeBtn	:true
		});
		
	});
$(document).ready(function(){	
	$("#send_form").click(function(){	
	
		var name 	= $("#name").val();
		var email 	= $("#email").val();
		var message = $("#message").val();
		
			if( (name == "") || (email == "") || (message == "")){
				$(".errormsg").html(" * tous les champs sont n�cessaires").fadeIn("Slow").fadeOut(3000);
			}else if(!isValidEmailAddress(email)){
				$(".errormsg").html(" * Email invalid").fadeIn("Slow").fadeOut(3000);
			} else{
				$(".errormsg").fadeOut();
				$.ajax({
					type	:'POST',
					url		:'php/process.php',
					data	:{	'name' 	 : name,
								'email'	 : email,
								'message': message,
							 },
					beforeSend: function(){
						$("#show_our_contact_form").empty().html("<h3>Sending your Message Please wait . . . </h3>");
					},
					error:function(){
						alert("Something went wrong!");
					},
					success:function(returnData){
						$("#show_our_contact_form").empty().html("<h3>Message envoy� <br/> Merci</h3>");
						
					}
				});
			}
			
	});
	});
	var isValidEmailAddress = function(email_add) {
		var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
		return pattern.test(email_add);
	};
	
	/************* Form validation *************/
	$(document).ready(function(){
		$("#formulairecontact").formValidation({
			alias		: "name",
			required	: "accept",
			err_list	: true
		}); 
               
	});
	
	
  /************* google analitic *************/
  
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43125897-1', 'byethost3.com');
  ga('send', 'pageview');

  /************* fancy box *************/

		