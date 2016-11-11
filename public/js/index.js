$(document).ready(function(){
	
	$(".panel").each(function(){
		if($(this).attr('id')!=0){
			$(this).hide();
		}
	});
	
	$(".proxima").click(function(e){
		e.preventDefault();
		
		//proximo quadro com opções
		var proxima = $(this).attr('title');
		
		//quadro atual
		var atual = proxima - 1;
		
		//pega a opção selecionada
		var valor = $("#"+atual+" input[type=radio]:checked").val();
		
		//caso não tenha nenhuma opção selecionada
		if(valor==undefined){
			
			$("#"+atual+" .form-group").addClass('has-error'); //adiciona classe de erro
			$(".alert-danger").show(); //exibe a mensagem de erro
		
		}else{
			
			$("#"+atual+" .form-group").removeClass('has-error'); //remove aa classe de erro
			$(".alert-danger").hide(); //esconde a mensagem de erro
			
			if(proxima < 5){ //se ainda não é o último quadro
				$(".panel").hide();  //esconde o quadro atual
				$("#"+proxima).show(); //mostra o próximo quadro
			}else{
				$("#frm_quiz").submit(); //caso seja o último quadro, submete o form
			}
		}
	});
});