  function enviarCorreo(){
	 var suscriptor = $("#name").val();
	 var email = $("#email").val();
	 var contenido = $("#message").val();
	 $.ajax(
		 {
			 url:'correo.php',
			 type:'POST',
			 data:{
				 s:suscriptor,
				 e:email,
				 c:contenido

			 }
		 }
	 ).done(function(resp){
		 if(resp>0){
			 Swal.fire("Mensaje De Confirmacion","Se envio el mensaje correctamente al correo: "+ email +"","success");
			 $("#name").val("");
			 $("#email").val("");
			 $("#message").val("");
			 $("#name").focus();
		 }else{
			Swal.fire("Mensaje De Error","No se pudo enviar el mensaje ","error");
		 }
	 })
  }