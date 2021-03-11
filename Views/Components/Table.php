<body>
  <div class="jquery-script-clear"></div>
  </div>
  <div class="mx-3 mt-5">
    <button id="table2-new-row-button" class="btn btn-outline-dark d-flex align-items-center mb-1">
      <i class="material-icons me-1" style="font-size: 20px;">add</i>
      Nouvelle ligne
    </button>
    <table class="table table-striped table-bordered" id="table2">
      <thead class="text-light" style="background-color: #343a40;">
        <tr>
          <th scope="col">Ref</th>
          <th scope="col">Libellee</th>
          <th scope="col">Prix</th>
          <th scope="col">Marque</th>
          <th scope="col">Image</th>
          <th scope="col">Sous categorie</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach (Produit_Model::getAll() as $produit) {
            echo '
              <tr>
                <td>'.$produit->refProduit.'</td>
                <td>'.$produit->libelle.'</td>
                <td>'.$produit->prix.'</td>
                <td>'.$produit->marque.'</td>
                <td>'.$produit->img.'</td>
                <td>'.$produit->sousCategorie.'</td>
              </tr>
            ';
          }
        ?>
      </tbody>
    </table>
</div>

  <script><?php include "bstable.js"; ?></script>

  <script>
    // Example with a add new row button & only some columns editable & removed actions column label
    var example2 = new BSTable("table2", {
      // editableColumns: "1,2",
      $addButton: $('#table2-new-row-button'),
      onEdit: function(row) {
        var obj = {};
        ["refProduit", "libelle", "prix", "marque", "img", "sousCategorie"].map((key, index) => {
          obj[key] = $(row).children()[index].innerHTML;
        });

        // console.log(obj);

        $.ajax({
          url: "http://localhost/Projects/SIGL-WEB-Project/products",
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
          url: "http://localhost/Projects/SIGL-WEB-Project/products",
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
          url: "http://localhost/Projects/SIGL-WEB-Project/products",
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
  </script>
  
  <script type="text/javascript">
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
  </script>

  <script>
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
  </script>

</body>