$(document).ready(function(){
	displayData();
	
	$('#save').on('click', function(){
		var catalogue = $('#catalogue').val();
		var jour = $('#jour').val();
		var heure = $('#heure').val();
		var date = $('#date').val();
		var salle = $('#salle').val();
		var prixa = $('#prixa').val();
		var prixe = $('#prixe').val();
		
		if($('#catalogue').val() == "" || $('#jour').val() == "" || $('heure').val()){
			alert("Please complete the required field");
		}else{
			$.ajax({
				type: 'POST',
				url: 'includes/saveProgramme.php',
				data: {
					catalogue: catalogue,
					jour: jour,
					heure: heure,
					date: date,
					salle: salle,
					prixa: prixa,
					prixe: prixe
				},
				success: function(data){
					$('#catalogue').val('');
					$('#jour').val('');
					$('#heure').val('');
					$('#date').val('');
					$('#salle').val('');
					$('#prixa').val('');
					$('#prixe').val('');
					alert(data);
					displayData();
				}
			})
		}
	});
	
	function displayData(){
		$.ajax({
			type: 'POST',
			url: 'includes/dataProgramme.php',
			data: {res: 1},
			success: function(data){
				$('#data').html(data)
			}
		});
	}
});