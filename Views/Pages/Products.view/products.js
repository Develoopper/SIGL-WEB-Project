$("#filterValue").on("keypress", function (e) {
  $.ajax({
    url: "http://localhost/Projects/SIGL-WEB-Project/products",
    data: {
      method: "GET",
      data: {
        filterBy: $("#filterBy").val(),
        filterValue: e.target.value
      }
    },
    dataType: "json",
    type: "POST",
    // header: { method: "PATCH" },
    success: function (data) {
      console.log("*****", data);
      var html = "";
      data.forEach(produit => {
        html += `
          <div class="col-3">
            <div class="card shadow-effect p-0" style="width: 200px; height: 250px; border: none;">
              <a href="product?id=${produit.refProduit[0]}" style="text-decoration: none;" class="text-dark">
                <img src='${produit.img[0]}'style="height: 180px; width: 180px" class="card-img-top" alt="...">
                <div class="card-body p-2">
                  <p class="card-text text-truncate">${produit.libelle[0]}</p>
                  <p class="card-text text-truncate">${produit.prix[0]} DH</p>
                </div>
              </a>
            </div>
          </div>
        `;
      });
      $("#container").html(html);
    }
  })
});