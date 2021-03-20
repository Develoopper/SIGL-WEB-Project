<footer class="bg-dark text-center text-light" id="footer" style="height: 155">
  <!-- Grid container -->
  <div class="container p-4">
    <span class="text-light" style="font-family: 'Dancing Script'; font-size: 35px;" href="#">Elegance</span>
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" id="copyright" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 - 2021
  </div>
  <!-- Copyright -->
  <script>
    $(document).ready( function () {
      var date = new Date();
      var current = date.getFullYear();
      var precedent = date.getFullYear() - 1;
      $("#copyright").html("©" + " " + precedent + " - "  + current);
    });
  </script>
</footer>