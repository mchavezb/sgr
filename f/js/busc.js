$('input#busc-submit').on('click',function(){
		var busc = $('input#busc').val();
		var comandamesa = document.getElementById('comandamesa').value;
		if ($.trim(busc) != ''){
			$.post("http://localhost/sgr/index.php/comanda/busc/",{busc: busc, comandamesa: comandamesa}, function(data){
				$('#busc-data').html(data);
			});
		}
});
$('input#entradas-submit').on('click',function(){
		var comandamesa = document.getElementById('comandamesa').value;
		var idTipo = document.getElementById('idTipo1').value;
			$.post("http://localhost/sgr/producto/listarCat/",{idTipo: idTipo,comandamesa: comandamesa}, function(data){
				$('#busc-data').html(data);
			});
});
$('input#carnes-submit').on('click',function(){
		var idTipo = document.getElementById('idTipo2').value;
		var comandamesa = document.getElementById('comandamesa').value;
			$.post("http://localhost/sgr/producto/listarCat/",{idTipo: idTipo,comandamesa: comandamesa}, function(data){
				$('#busc-data').html(data);
			});
});
$('input#sopas-submit').on('click',function(){
		var idTipo = document.getElementById('idTipo3').value;
		var comandamesa = document.getElementById('comandamesa').value;
			$.post("http://localhost/sgr/producto/listarCat/",{idTipo: idTipo,comandamesa: comandamesa}, function(data){
				$('#busc-data').html(data);
			});
});
$('input#pescados-submit').on('click',function(){
		var idTipo = document.getElementById('idTipo4').value;
		var comandamesa = document.getElementById('comandamesa').value;
			$.post("http://localhost/sgr/producto/listarCat/",{idTipo: idTipo,comandamesa: comandamesa}, function(data){
				$('#busc-data').html(data);
			});
});
$('input#pastas-submit').on('click',function(){
		var idTipo = document.getElementById('idTipo5').value;
		var comandamesa = document.getElementById('comandamesa').value;
			$.post("http://localhost/sgr/producto/listarCat/",{idTipo: idTipo,comandamesa: comandamesa}, function(data){
				$('#busc-data').html(data);
			});
});
$('input#postres-submit').on('click',function(){
		var idTipo = document.getElementById('idTipo6').value;
		var comandamesa = document.getElementById('comandamesa').value;
			$.post("http://localhost/sgr/producto/listarCat/",{idTipo: idTipo,comandamesa: comandamesa}, function(data){
				$('#busc-data').html(data);
			});
});