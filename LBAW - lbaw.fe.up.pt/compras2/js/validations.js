function validateUserData(theForm) {
	var reason = "";

  reason += validateUsername(theForm.nome);
  reason += validatePassword(theForm.password);
  reason += validateEmail(theForm.email);
  
  if(theForm.gestor.value == 1) {
	reason += validateHourNumbers(theForm.semana_entrada);
	reason += validateHourNumbers(theForm.semana_saida);
	reason += validateHourNumbers(theForm.fsemana_entrada);
	reason += validateHourNumbers(theForm.fsemana_saida);
	reason += validateHourNumbers(theForm.semana_entrada_min);
	reason += validateHourNumbers(theForm.semana_saida_min);
	reason += validateHourNumbers(theForm.fsemana_entrada_min);
	reason += validateHourNumbers(theForm.fsemana_saida_min);
	reason += validateHours(theForm.semana_entrada, theForm.semana_saida, theForm.semana_entrada_min, theForm.semana_saida_min);
	reason += validateHours(theForm.fsemana_entrada, theForm.fsemana_saida, theForm.fsemana_entrada_min, theForm.fsemana_saida_min);
  }
        
  if (reason != "") {
    alert("Alguns campos devem ser corrigidos:\n" + reason);
    return false;
  }
  //alert("All fields are filled correctly");
  return true;
}

function validateEditPassword(theForm) {
var reason = "";

  reason += validatePassword(theForm.newpassword1);
  reason += validatePassword(theForm.newpassword2);
        
  if (reason != "") {
    alert("Alguns campos devem ser corrigidos:\n" + reason);
    return false;
  }
  //alert("All fields are filled correctly");
  return true;
}

function validateEditUser(gestor, theForm) {
	var reason = "";
  
	reason += validateUsername(theForm.nome);
	
	if(gestor){
		reason += validateHourNumbers(theForm.semana_entrada);
		reason += validateHourNumbers(theForm.semana_saida);
		reason += validateHourNumbers(theForm.fsemana_entrada);
		reason += validateHourNumbers(theForm.fsemana_saida);
		reason += validateHourNumbers(theForm.semana_entrada_min);
		reason += validateHourNumbers(theForm.semana_saida_min);
		reason += validateHourNumbers(theForm.fsemana_entrada_min);
		reason += validateHourNumbers(theForm.fsemana_saida_min);
		reason += validateHours(theForm.semana_entrada, theForm.semana_saida, theForm.semana_entrada_min, theForm.semana_saida_min);
		reason += validateHours(theForm.fsemana_entrada, theForm.fsemana_saida, theForm.fsemana_entrada_min, theForm.fsemana_saida_min);
	}
	
        
	if (reason != "") {
		alert("Alguns campos devem ser corrigidos:\n" + reason);
		return false;
	}
	//alert("All fields are filled correctly");
	return true;
}

function validateHourNumbers(fld) {
	var error = "";
    var horaRE = /^[0-9]{1,2}$/
	 
    if (!horaRE.test(fld.value)) {
		fld.style.background = 'Yellow'; 
		error = "Insira hora: 1 ou 2 digitos.\n";
	}
	if (fld.value == "") {
        fld.style.background = 'Yellow'; 
        error = "Insira hora.\n";
    } else {
        fld.style.background = 'White';
    }
    return error;
}

function validateHours(he, hs, me, ms) {
	var error = "";
	var heaux = parseInt(he.value, 10);
	var hsaux = parseInt(hs.value, 10);
	var meaux = parseInt(me.value, 10);
	var msaux = parseInt(ms.value, 10);
		
    if (hsaux < heaux) {
		hs.style.background = 'Yellow';
		he.style.background = 'Yellow';
		ms.style.background = 'Yellow'; 
		me.style.background = 'Yellow'; 
		error = "Hora de saida menor que de entrada.\n";
	}
	else if (hsaux == heaux) {
        hs.style.background = 'Yellow';
		he.style.background = 'Yellow';
		ms.style.background = 'Yellow'; 
		me.style.background = 'Yellow';
		
		if (msaux < meaux) {
			error = "Hora de saida menor que de entrada.\n";
		}
		else {
			error = "Tem de trabalhar pelo menos 1 hora.\n";
		}			
	}
	else if ((heaux + 1)== hsaux) {
        if (meaux <= msaux) {
			hs.style.background = 'White';
			he.style.background = 'White';
			ms.style.background = 'White';
			me.style.background = 'White';
		}
		else {
			hs.style.background = 'Yellow';
			he.style.background = 'Yellow';
			ms.style.background = 'Yellow'; 
			me.style.background = 'Yellow'; 
			error = "Tem de trabalhar pelo menos 1 hora.\n";
		}
	}
    else {
        hs.style.background = 'White';
		he.style.background = 'White';
		ms.style.background = 'White';
		me.style.background = 'White';
    }
    return error;
}

function validateQuantidade(theForm) {
	var reason = "";

	reason += validateZero(theForm.qdisponivel);
	        
	if (reason != "") {
		alert("Alguns campos devem ser corrigidos:\n" + reason);
		return false;
	}
	//alert("All fields are filled correctly");
	return true;
	
}

function validateQuantidades(theForm) {
	var reason = "";

	reason += validateZero(theForm.qminima);
	reason += validateZero(theForm.qmaxima);
	reason += validateZero(theForm.qdisponivel);
	reason += validateQminQmax(theForm.qminima, theForm.qmaxima);
        
	if (reason != "") {
		alert("Alguns campos devem ser corrigidos:\n" + reason);
		return false;
	}
	//alert("All fields are filled correctly");
	return true;
	
}

function validateReceita2(theForm) {
	var reason = "";

	reason += validateZero(theForm.tempo_preparo);
	reason += validateZero(theForm.qpessoas);
	        
	if (reason != "") {
		alert("Alguns campos devem ser corrigidos:\n" + reason);
		return false;
	}
	//alert("All fields are filled correctly");
	return true;
	
}

function validateReceita1(theForm) {
	var reason = "";

	reason += validateZero(theForm.tempo);
	reason += validateZero(theForm.quant);
	        
	if (reason != "") {
		alert("Alguns campos devem ser corrigidos:\n" + reason);
		return false;
	}
	//alert("All fields are filled correctly");
	return true;
	
}

function validateZero(fld) {
	var error = "";
	
	if (fld.value <= 0) {
		fld.style.background = 'Yellow'; 
		error = "Quantidade tem de ser maior que 0.\n";
	}
	else
		fld.style.background = 'White';
		
	return error;
}

function validateQminQmax(qmin, qmax) {
	var error = "";
	var qminaux = parseInt(qmin, 10);
	var qmaxaux = parseInt(qmax, 10);
	
	if (qmaxaux < qminaux) {
		qmin.style.background = 'Yellow'; 
		qmax.style.background = 'Yellow'; 
		error = "Quantidade minima tem de ser menor que maxima.\n";
	}
	else
	{
		qmin.style.background = 'White';
		qmax.style.background = 'White';
	}
	
	return error;
}

function validateEmpty(fld) {
    var error = "";
 
    if (fld.value.length == 0) {
        fld.style.background = 'Yellow'; 
        error = "O campo requerido não foi preenchido.\n"
    } else {
        fld.style.background = 'White';
    }
    return error;  
}

function validateUsername(fld) {
    var error = "";
    var illegalChars = /\W/; // allow letters, numbers, and underscores
 
    if (fld.value == "") {
        fld.style.background = 'Yellow'; 
        error = "Insira um nome.\n";
    } else if ((fld.value.length < 5) || (fld.value.length > 32)) {
        fld.style.background = 'Yellow'; 
        error = "O nome nao tem um tamanho valido (min:5, max:32).\n";
    } else if (illegalChars.test(fld.value)) {
        fld.style.background = 'Yellow'; 
        error = "O nome deve ter letras, numeros e '_'.\n";
    } else {
        fld.style.background = 'White';
    }
    return error;
}

function validatePassword(fld) {
    var error = "";
    var illegalChars = /[\W_]/; // allow only letters and numbers 
 
    if (fld.value == "") {
        fld.style.background = 'Yellow';
        error = "Deve inserir uma password.\n";
    } else if ((fld.value.length < 7) || (fld.value.length > 32)) {
        error = "Tamanho da password incorrecto (min:7, max.32). \n";
        fld.style.background = 'Yellow';
    } else if (illegalChars.test(fld.value)) {
        error = "A password deve ser apenas letras e numeros.\n";
        fld.style.background = 'Yellow';
    } else if (!((fld.value.search(/(a-z)+/)) && (fld.value.search(/(0-9)+/)))) {
        error = "A password deve ter pelo menos um numero.\n";
        fld.style.background = 'Yellow';
    } else {
        fld.style.background = 'White';
    }
   return error;
}  

function trim(s)
{
  return s.replace(/^\s+|\s+$/, '');
}

function validateEmail(fld) {
    var error="";
    var tfld = trim(fld.value);                        // value of field with whitespace trimmed off
    var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
    var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
   
    if (fld.value == "") {
        fld.style.background = 'Yellow';
        error = "Preencha o email\n";
    } else if (!emailFilter.test(tfld)) {              //test email for illegal characters
        fld.style.background = 'Yellow';
        error = "Endereco de email invalido.\n";
    } else if (fld.value.match(illegalChars)) {
        fld.style.background = 'Yellow';
        error = "O email contem caracteres ilegais.\n";
	} else if (fld.value.length > 64) {
        fld.style.background = 'Yellow';
    } else {
        fld.style.background = 'White';
    }
    return error;
}

function validatePhone(fld) {
    var error = "";
    var stripped = fld.value.replace(/[\(\)\.\-\ ]/g, '');    

   if (fld.value == "") {
        error = "You didn't enter a phone number.\n";
        fld.style.background = 'Yellow';
    } else if (isNaN(parseInt(stripped))) {
        error = "The phone number contains illegal characters.\n";
        fld.style.background = 'Yellow';
    } else if (!(stripped.length == 10)) {
        error = "The phone number is the wrong length. Make sure you included an area code.\n";
        fld.style.background = 'Yellow';
    }
    return error;
}