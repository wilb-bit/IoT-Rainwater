$(document).ready(function(){

	$.ajax({
		url: "http://localhost/total2/data_og.php",
		type: "GET",
		success : function(data) {
			console.log(data);

			var level = {
				Week : [],
                day :[]
			
			};

			

			var len = data.length; 

			for (var i =0; i < len; i++) {
					level.Week.push(data[i].water);
                    level.day.push(data[i].timedate);

				}

            
			console.log(level);



			var ctx = $("#line-chartcanvas");
			
			var data = {
				labels : level.day,
				
				datasets: [
				{
					label : "Water",
					data : level.Week,
					backgroundColor : "blue",
					boarderColor : "lightblue",
					fill: false,
					lineTension : 0,
					pointRadius : 5
				}
				]
			}
			var options = {
				title : {
					display : true,
					position : "top",
					text : "Water level:",
					fontSize : 16,
					fontColor : "#333"
				},
				
				legend : {
					display : true,
					position : "bottom"
				}

				
			};

			var chart = new Chart( ctx, {
				type : "line",
				data : data,
				options : options
			});
		},
		error : function(data){
			console.log(data);
		}


	});
});