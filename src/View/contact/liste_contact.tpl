
  <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
    <?php
    foreach ($contacts as $c)
      echo "<div style=\"border: 2px solid black; padding: 1rem;\">" . utf8_encode($c['nom']) . " " . utf8_encode($c['prenom']) . "" . "Email : " . utf8_encode($c['email']) . "</div>";
    ?>
  </div>
  	</section>
</body>

</html>