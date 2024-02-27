var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
    document.getElementById("btn").disabled = false;
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
    document.getElementById("btn").disabled = true;
  }
}



// username unique
$(document).ready(function(){
		$('#username').blur(function(){
			var username=$(this).val();
			$.ajax({
				url:"doct_checkAjax.php",
				method:"POST",
				data:{user_name:username},
				dataType:"text",
				success:function(data)
				{
					$('#availability').html(data)
				}
			});
		});
	});