$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});



// Example with a add new row button & only some columns editable & removed actions column label
var example2 = new BSTable("table", {
	// editableColumns: "1,2",
	$addButton: $('#table-new-row-button'),
	onEdit: function(row) {
		var obj = {};
		["id", "libelle", "categorie"].map((key, index) => {
			obj[key] = $(row).children()[index].innerHTML;
		});

		// console.log(obj);

		$.ajax({
			url: "http://localhost/Projects/SIGL-WEB-Project/sousCategories",
			data: {
				method: "PATCH",
				data: obj
			},
			dataType: "json",
			type: "POST",
			// header: { method: "PATCH" },
			success: function (data) {
				console.log("*****", data);
			}

		})
	},
	onDelete: function(row) {
		$.ajax({
			url: "http://localhost/Projects/SIGL-WEB-Project/sousCategories",
			data: {
				method: "DELETE",
				data: $(row).children()[0].innerHTML
			},
			dataType: "json",
			type: "POST",
			// header: { method: "PATCH" },
			success: function (data) {
				console.log("*****", data);
			}

		})
	},
	onAdd: function(id) {
		console.log("+++++++", id);
		$.ajax({
			url: "http://localhost/Projects/SIGL-WEB-Project/sousCategories",
			data: {
				method: "POST",
				data: id
			},
			dataType: "json",
			type: "POST",
			// header: { method: "PATCH" },
			success: function (data) {
				console.log("*****", data);
			}
		})
	},
	// advanced: {
	//   columnLabel: ''
	// }
});
example2.init();



var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-36251023-1']);
_gaq.push(['_setDomainName', 'jqueryscript.net']);
_gaq.push(['_trackPageview']);

(function() {
	var ga = document.createElement('script');
	ga.type = 'text/javascript';
	ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(ga, s);
})();



try {
	fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", {
		method: 'HEAD',
		mode: 'no-cors'
	})).then(function(response) {
		return true;
	}).catch(function(e) {
		var carbonScript = document.createElement("script");
		carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
		carbonScript.id = "_carbonads_js";
		document.getElementById("carbon-block").appendChild(carbonScript);
	});
} catch (error) {
	console.log(error);
}