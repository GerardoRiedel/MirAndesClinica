/* Jvalidate creado por franciscofernando | @francisco_094 año 2013*/
	jQuery.fn.Jvalidate = function(data){
		var formulario = $(this);
		var contadorValido = 0;
		if(data != null){
			if(data.submit == null){
				var submit = 'input[type=submit]';
			}else{
				var submit = data.submit;
			}
			if(data.language == null){
				var language = 'es';
			}else{
				var language = data.language;
			}	
			if(data.date == null){
				var date = 'js';
			}else{
				var date = data.date;
			}
			if(data.success == null){
				var success = function(){
								return true;
							  }
			}else{
				var success = data.success;
			}
			if(data.alertStyle == null){
				var alertStyle = {'z-index': 1000, display: 'none', position: 'absolute', 'font-size': '12px', color: '#fff','border-radius': '4px', padding: '5px', 'text-align': 'center'};
			}else{
				var alertStyle = data.alertStyle;
			}
		}else{
			var submit = 'input[type=submit]';
			var language = 'es';
			var position2 = '';
			var date = 'js';
			var alertStyle = {'z-index': 1000, display: 'none', position: 'absolute', 'font-size': '12px', color: '#fff','border-radius': '4px', padding: '5px', 'text-align': 'center'};
			var success = function(){
								return true;
							  }
		}
		function trim(myString){
			return myString.replace(/^\s+/g,'').replace(/\s+$/g,'');
		}
		function textValidate(data){
			if(/^[A-Za-z0-9áéíóú,.# ]+$/.test(data)){
				return true;
			}else{
				return false;
			}
		}
		function numberValidate(data){
			if(/^[0-9]+$/.test(data)){
				return true;
			}else{
				return false;
			}
		}
		function emailValidate(data){
			if(typeof(data.part) != 'undefined'){
				if(data.part==2){
					var index = $(data.elemento).attr('data-index');
					var prev = $('input[data-index='+(index-1)+']');
					var valor1 = $(prev).val();
					var regexp1 = /^\w+([\.-]?\w+)*$/;
					var regexp2 = /^\w+([\.-]?\w+)*(\.\w{2,4})+$/;
					if(regexp1.test(valor1)){
						if(regexp2.test(data.valor)){
							return true;
						}else{
							return false;
						}
					}else{
						return false;
					}
				}
			}else{
				if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(data.valor)){
					return true;
				}else{
					return false;
				}
			}
		}
		function dateValidate(data){
			var config = data.config.replace("yyyy","[1-3][0-9][0-9][0-9]");
			var config = config.replace("mm","[0-1][0-9]");
			var config = config.replace("dd","[0-3][0-9]");
			var config = new RegExp('^'+config+'$');
			if(config.test(data.valor)){
				return true;
			}else{
				return false;
			}
		}
		var estado = null;
		function ageValidate(data){
			if(date == 'js'){
				var date = new Date();
				var dateDay = date.getDate();
				var dateMonth = date.getMonth()+1;
				var dateYear = date.getFullYear();
				if(calcularAge({elemento: data.elemento, valor: data.valor, config: data.config})){
					estado = true;
				}else{
					estado = false;
				}
			}else{
				var dateDay = null;
				var dateMonth = null;
				var dateYear = null;
				$.ajax({
					url: 'lib/date.php'
					}).done(function(msg){
							msg = msg.replace(/([1-3][0-9][0-9][0-9])([0-1][0-9])([0-3][0-9])/, '$1-$2-$3');
							msg = msg.split('-');
							dateDay = msg[2];
							dateMonth = msg[1];
							dateYear = msg[0];
							if(calcularAge({elemento: data.elemento, valor: data.valor, config: data.config, dateYear: dateYear, dateMonth: dateMonth, dateDay: dateDay})){
								estado = true;
							}else{
								estado = false;
							}
						return true;
					});
			}
			return estado;
		}
		function calcularAge(data){
			var minAge = $(data.elemento).attr('data-minAge');
			var maxAge = $(data.elemento).attr('data-maxAge');
			var config = data.config.replace('yyyy', ';yyyy;');
			var config = config.replace('mm', ';mm;');
			var config = config.replace('dd', ';dd;');
			var pos = config.split(';');
			for(i=0; i<pos.length; i++){
				if(pos[i]=='dd'){
					var posDay = i;
				}else if(pos[i]=='mm'){
					var posMonth = i;
				}else if(pos[i]=='yyyy'){
					var posYear = i;
				}
			}
			data.valor = data.valor+' ';
			var valor = data.valor.replace(/([1-3][0-9]{3})/g, ';$1;');
			var valor = valor.replace(/([0-3][0-9])[^0-9]/g, ';$1;');
			var valor = valor.split(';');
			var year = data.dateYear-valor[posYear];
			var month = data.dateMonth-valor[posMonth];
			var day = data.dateDay-valor[posDay];
			if(month<0){
				year--;
				month = Math.abs(month);
				month = 12-month;
			}
			if(day<0){
				month--;
				day = Math.abs(day);
				day = 30-day;
			}
			if( typeof(minAge) == 'undefined' ){
				var minAge =  year;
			}
			if( typeof(maxAge) == 'undefined' ){
				var maxAge = year;
			}
			if( (year>=minAge)&&(year<=maxAge) ){
				return true;
			}else{
				return false;
			}					
		}
		function rutValidate(data){
			var numero = data.valor.replace(/\./g,'');
			var numero = numero.toLowerCase();
			var numero = numero.split('-');
			var index = $(data.elemento).attr('data-index');
			function rut(T){var M=0,S=1;for(;T;T=Math.floor(T/10))S=(S+T%10*(9-M++%6))%11;return S?S-1:'k';}			
			if(typeof(data.part) != 'undefined'){
				if(data.part==2){
					var prev = $('input[data-index='+(index-1)+']');
					var numero1 = $(prev).val();
					if(rut(numero1)==numero[0]){
						return true;
					}else{
						return false;
					}
				}
			}else{
				if(rut(numero[0])==numero[1]){
					return true;
				}else{
					return false;
				}
			}
		}
		function checkValidate(data){
			var elemento = data.elemento;
			if($(elemento).is(":checked")){
				return true
			}else{
				return false;
			}
		}
		function vIE(){
			return (navigator.appName=='Microsoft Internet Explorer')?parseFloat((new RegExp("MSIE ([0-9]{1,}[.0-9]{0,})")).exec(navigator.userAgent)[1]):-1;
			}
		function alertValidate(data){
			var position = $(data.elemento).offset();
			var width = $(data.elemento).width();
			var height = $(data.elemento).height();
			var position2 = $(data.elemento).attr('data-alertPosition');
			var version = vIE();
			var index = $(data.elemento).attr('data-index');
			if( (version>0)&&(version<10) ){
				var background = 'background:rgb(0, 0, 0);';
			}else{
				var background = 'background:rgba(0, 0, 0, 0.5);';
			}
			var style = 'z-index:1000;display:none;position:absolute;font-size:12px;color:#fff;border-radius:4px; padding:5px;text-align:center;';
			if($(data.elemento).attr('type')=='checkbox'){
				switch(position2){
					case 'top':
						var pos = 'left:'+(position.left+(width/6))+'px;top:'+(position.top-32)+'px;';
					break;
					case 'bottom':
						var pos = 'left:'+(position.left+(width/6))+'px;top:'+(position.top+32)+'px;';
					break;
					case 'left':
						var pos = 'left:'+(position.left-width+(width/6)+15)+'px;top:'+(position.top-7)+'px;';
					break;
					case 'right':
						var pos = 'left:'+(width+position.left+15)+'px;top:'+(position.top-7)+'px;';
					break;
					default:
						var pos = 'left:'+(width+position.left+15)+'px;top:'+(position.top-7)+'px;';
					break;
				}
			}else{
				switch(position2){
					case 'top':
						var pos = 'left:'+(position.left+(width/6))+'px;top:'+(position.top-32)+'px;';
					break;
					case 'bottom':
						var pos = 'left:'+(position.left+(width/6))+'px;top:'+(position.top+32)+'px;';
					break;
					case 'left':
						var pos = 'left:'+(position.left-width+(width/6)+15)+'px;top:'+(position.top)+'px;';
					break;
					case 'right':
						var pos = 'left:'+(width+position.left+15)+'px;top:'+(position.top)+'px;';
					break;
					default:
						var pos = 'left:'+(width+position.left+15)+'px;top:'+(position.top)+'px;';
					break;
				}				
			}

			var back = 0;
			for (var i in alertStyle) { 
				if(i=='z-index'){
					style = style.replace(/z-index:1000;/gi, i+':'+alertStyle[i]+';');
				}else if(i=='display'){
					style = style.replace(/display:none;/gi, i+':'+alertStyle[i]+';');
				}else if(i=='position'){
					style = style.replace(/position:absolute;/gi, i+':'+alertStyle[i]+';');
				}else if(i=='font-size'){
					style = style.replace(/font-size:12px;/gi, i+':'+alertStyle[i]+';');
				}else if(i=='color'){
					style = style.replace(/color:#fff;/gi, i+':'+alertStyle[i]+';');
				}else if(i=='border-radius'){
					style = style.replace(/border-radius:4px;/gi, i+':'+alertStyle[i]+';');
				}else if(i=='padding'){
					style = style.replace(/padding:5px;/gi, i+':'+alertStyle[i]+';');
				}else if(i=='text-align'){
					style = style.replace(/text-align:center;/gi, i+':'+alertStyle[i]+';');
				}else if(i=='background'){
					var back = 1;
					style = style+i+':'+alertStyle[i]+';';
				}else{
     				style = style+i+':'+alertStyle[i]+';';					
				}
  			}
  			if(back==0){
  				style = style+background;
  			} 
  			console.log(style);
			$('body').append('<div data-information="true" data-index="'+index+'" style="'+pos+style+'">'+data.msg+'</div>');
			$('div[data-information=true]').fadeIn('fast');
		}
		function validar(data){
			if(language == 'es'){
				var alertText = 'No se aceptan caracteres especiales.';
				var alertNumber = 'Solo se aceptan numeros.';
				var alertDate = 'El campo no esta con el formato '+data.dateConfig2+'.';
				var alertEmail = 'Solo se aceptan email validos.';
				var alertRut = 'Solo se acepta RUT valido.';
				var alertTextWidth = 'minimo '+data.min+' y maximo '+data.max+' caracteres.';
				var alertAge = 'No tienes el rango de edad requerido.';
				var alertCheck = 'Para continuar marca la opción';
			}else if(language == 'en'){
				var alertText = 'Special characters are not accepted.';
				var alertNumber = 'Only accept numbers.';
				var alertDate = 'The field is not in the format '+data.dateConfig2+'.';
				var alertEmail = 'Only accept valid email.';
				var alertRut = 'Only accept valid RUT.';
				var alertTextWidth = 'minimum '+data.min+' y maximum '+data.max+' characters.';
				var alertAge = 'You do not have the required age range.';
				var alertCheck = 'To further check the option';
			}
			switch(data.type){
				case 'text': 
					if(textValidate(data.valor)){
						if( (data.valor.length>data.min)&&(data.valor.length<=data.max) ){
								contadorValido++;
						}else{
							alertValidate({elemento: data.elemento, msg: alertTextWidth});
						}
					}else{
						alertValidate({elemento: data.elemento, msg: alertText});
					}
				break;
				case 'email':
					if(emailValidate({valor: data.valor, part: data.part, elemento: data.elemento})){
						if( (data.valor.length>data.min)&&(data.valor.length<=data.max) ){
							contadorValido++;
						}else{
							alertValidate({elemento: data.elemento, tmsg: alertTextWidth});
						}
					}else{
						alertValidate({elemento: data.elemento, msg: alertEmail});
					}
				break;
				case 'date':
					if(dateValidate({valor: data.valor, config: data.dateConfig})){
						if( (data.valor.length>data.min)&&(data.valor.length<=data.max) ){
							/*alert(ageValidate({elemento: data.elemento, config: data.dateConfig, valor: data.valor}))*/
							console.log(ageValidate({elemento: data.elemento, config: data.dateConfig, valor: data.valor}));
							//if(ageValidate({elemento: data.elemento, config: data.dateConfig, valor: data.valor})){
							//	contadorValido++;									
							//}else{
							//	alertValidate({elemento: data.elemento, msg: alertAge});
							//}
						}else{
							alertValidate({elemento: data.elemento, msg: alertTextWidth});
						}
					}else{
						alertValidate({elemento: data.elemento, msg: alertDate});
					}
				break;
				case 'number':
					if(numberValidate(data.valor)){
						if( (data.valor.length>data.min)&&(data.valor.length<=data.max) ){
							contadorValido++;
						}else{
							alertValidate({elemento: data.elemento, msg: alertTextWidth});
						}
					}else{
						alertValidate({elemento: data.elemento, msg: alertNumber});
					}
				break;
				case 'rut':
					if(rutValidate({elemento: data.elemento, valor: data.valor, part: data.part})){
						if( (data.valor.length>data.min)&&(data.valor.length<=data.max) ){
							contadorValido++;
						}else{
							alertValidate({elemento: data.elemento, msg: alertTextWidth});
						}
					}else{
						alertValidate({elemento: data.elemento, msg: alertRut});
					}
				break;
				case 'checkbox':
					if(checkValidate({elemento: data.elemento})){
							contadorValido++;
					}else{
						alertValidate({elemento: data.elemento, msg: alertCheck});
					}
				break;
			}
		}
	function validate(){
			var elementos = $(formulario).find('input[type!=submit], textarea').length;
			var elementos2 = $(formulario).find('input[data-part=2]').length;
			$('div[data-information=true]').remove();
			for(i=1; i<=elementos;i++){
				var elemento = $(formulario).find('input, textarea').eq(i-1);
				var type = $(elemento).attr('data-type'); // text, email, date, number
				var important = $(elemento).attr('data-importance'); // important, no-important
				var valor = trim($(elemento).val());
				var dateConfig = $(elemento).attr('data-dateConfig');
				var part = $(elemento).attr('data-part');
				$(elemento).attr('data-index', i);
				if(typeof($(elemento).attr('data-min'))!='undefined'){
					var min = $(elemento).attr('data-min');
				}else{
					var min = 0;
				}	
				if(typeof($(elemento).attr('data-max'))!='undefined'){
					var max = $(elemento).attr('data-max');
				}else{
					var max = valor.length;
				}
				if(language == 'es'){
					var alertNull = 'Este campo no puede estar nulo.';
					if(typeof (dateConfig) != 'undefined'){
						var dateConfig2 = dateConfig.replace('dd', 'Día');
						var dateConfig2 = dateConfig2.replace('mm', 'Mes');
						var dateConfig2 = dateConfig2.replace('yyyy', 'Año');

					}
				}else if(language == 'en'){
					var alertNull = 'This input can not be null.';
					if(typeof (dateConfig) != 'undefined'){
						var dateConfig2 = dateConfig.replace('dd', 'Day');
						var dateConfig2 = dateConfig2.replace('mm', 'Month');
						var dateConfig2 = dateConfig2.replace('yyyy', 'Year');
					}
				}
				if(typeof (type) != 'undefined'){
					if(part != 1){
						if(important == 'important'){
							if(valor!=''){
								validar({type: type, valor: valor, elemento: elemento, min: min, max: max, formulario: formulario, dateConfig: dateConfig, dateConfig2: dateConfig2, part: part});
							}else{
								alertValidate({elemento: elemento, msg: alertNull});	
							}
						}else if( (typeof (important) == 'undefined')||(important == 'no-important') ){
							if(valor!=''){
								validar({type: type, valor: valor, elemento: elemento, min: min, max: max, formulario: formulario, dateConfig: dateConfig, dateConfig2: dateConfig2, part:part});
							}else{
								contadorValido++;							
							}
						}
					}
				}else{
					contadorValido++;
				}
			}
			if(contadorValido==(elementos-elementos2)){
				contadorValido = 0;
				return success();
			}else{
				contadorValido = 0;
				return false;
			}			
		}
	$(formulario).submit(function(){ return validate(); });
	$(submit).click(function(){ return validate(); });
	$(formulario).find('input, textarea').focusout(function(){
		var index = $(this).attr('data-index');
		$('div[data-index='+index+']').fadeOut('fast');
	});
	};
