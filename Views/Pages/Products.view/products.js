
		$(function() {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 2000,
				values: [0, 2000],
				slide: function(event, ui) {
					$("#prix").val(ui.values[0] + " DH - " + ui.values[1] + " DH");
					$("#prix").trigger("input", {
						prixMin: ui.values[0],
						prixMax: ui.values[1]
					});
				}
			});
			$("#prix").val($("#slider-range").slider("values", 0) + " DH - " + $("#slider-range").slider("values", 1) + " DH");
		});

		$("[name=filtre]").on("input", function(e, {
			prixMin,
			prixMax
		} = {
			prixMin: 0,
			prixMax: 2000
		}) {
			if (prixMin == 0 && prixMax == 2000) {
				prixMin = $("#slider-range").slider("values", 0);
				prixMax = $("#slider-range").slider("values", 1);
			}
			// response.writeHead(200,
         	// {
			// 	"Content-Type": "application/json",
			// 	"Access-Control-Allow-Origin": "http://localhost:5050"
        	// });
			$.ajax({
				url: "http://localhost:5050/SIGL-WEB-Project/products",
				data: {
					method: "GET",
					data: {
						libelle: $("#libelle").val(),
						marque: $("#marque").val(),
						prixMin: parseFloat(prixMin),
						prixMax: parseFloat(prixMax),
						sousCategorie: id
					}
				},

				dataType: 'json',
				type: "POST",
				// header: { method: "PATCH" },
				success: function(data) {
					console.log("*****", data);
					var html = "";
					data.forEach(produit => {
						html += `
							<div class="col-3 card shadow-effect p-0 me-4 mb-4" style="width: 200px; height: 270px; border: none;">
								<a href="product?id=${produit.refProduit[0]}" style="text-decoration: none;" class="text-dark">
									<img src='${produit.img[0]}' style="height: 200px; width: 200px" class="card-img-top" alt="">
									<div class="card-body p-2">
										<p class="card-text text-truncate" style="font-size: 13px">${produit.libelle[0]}</p>
										<p class="card-text text-truncate" style="font-size: 14px"><b>${produit.prix[0]} DH</b></p>
									</div>
								</a>
							</div>
						`;
					});
					$("#container").html(html);
				},
				error: function(error) {
					console.log("erreur", error);
				}
			})
		});

		$(document).ready(function() {
			$("#slider-range").children("span").css("border-radius", "50px");
		});