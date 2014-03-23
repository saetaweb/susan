/**
Documento JS que nos permite validar los Distintos Formularios Web de nuestro Site.
*/

//Funcion para validar el Formulario de Resgitro de Usuario
$(document).ready(function(){
                $("#frmNewUser").validate({
                    rules:{
							email:{
								email:true,
								required:true
							},
                            usuario:{
                                required:true	
                            },
                            pass:{
                                required:true
                            },
							pass2:{
								equalTo:"#pass"			
							}
                           
                    },
                    messages:{
						email:{
						
							required:"Campo Obligatorio.",
							email:"Ingrese un Email Correcto."
						},
                        usuario:{
                            required:"Campo obligatorio."
                        },
                        pass:{
                            required:"Campo obligatorio."
                        },
						pass2:{
							equalTo:"Las Claves no coinciden."
						} 
                    }
                  
				  })
})
//====================================================================

//Funcion para Validar el Formulario De Login o Inicio de Sesion.
$(document).ready(function(){
                $("#frmLogin").validate({
                    rules:{
                            usuario:{
                                required:true
                            },
                            pass:{
                                required:true
                            }
                           
                    },
                    messages:{
                        usuario:{
                            required:"Campo obligatorio."
                        },
                        pass:{
                            required:"Campo obligatorio."
                        }
                       
                    }
                  
				  })
})
//==========================================================================================

//Funcion para Validar el Formulario para registrar una nueva url o link.
$(document).ready(function(){
                $("#frmNewUrl").validate({
                    rules:{
                           new_url:{
                                required:true,
								url:true
						   }
                           
                    },
                    messages:{
                        new_url:{
                            required:"Campo obligatorio.",
							url:"Ingrese una URL Valida."	
						
                        }
                       
                    }
                  
				  })
})
//===================================================================================================

//Funcion para Validar el Formulario de Cambiar Contraseña
//Se Pudo haber validado con Jquery, para darle mas usabilidad a nuestra pagina
//Pero para variar y ver otra forma, preferí validarlo con JS puro, como lo hace CesarCz.
function validar()
{
	var f=document.frmChangePass;
	
	if (f.old_pass.value==0){
		alert("Ingrese la Clave Antigua.");
		f.old_pass.value="";
		f.old_pass.focus();		
		return false;
	}
	
	if (f.new_pass.value==0){
		alert("Ingrese la Nueva Clave a Cambiar.");
		f.new_pass.value="";
		f.new_pass.focus();
		return false;
	}
	
	if (f.new_pass.value != f.new_pass2.value){
		alert("Las Claves Deben Coincidir");
		f.new_pass2.value="";
		f.new_pass2.focus();
		return false;
	}
	f.submit();			
}