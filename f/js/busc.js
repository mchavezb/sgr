$('input#busc-submit').on('click',function(){
		var busc = $('input#busc').val();
		var comandamesa = document.getElementById('comandamesa').value;
		if ($.trim(busc) != ''){
			$.post("http://localhost/sgr/index.php/comanda/busc/",{busc: busc, comandamesa: comandamesa}, function(data){
				$('#busc-data').html(data);
			});
		}
});