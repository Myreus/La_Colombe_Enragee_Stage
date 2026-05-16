<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Test Swiper</title>
  <!-- CSS Swiper -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <style>
    /* Réinitialisation simple pour éviter les conflits */
    * { margin: 0; padding: 0; box-sizing: border-box; }

    /* Conteneur principal du carrousel */
    .swiper {
      width: 100%;
      max-width: 800px;
      margin: 50px auto; /* pour le centrage vertical de la démo */
    }

    /* Force chaque slide à être un conteneur flex centré */
    .swiper-slide {
      display: flex;
      justify-content: center;
      align-items: center;
      background: #eee; /* fond léger pour visualiser */
    }

    /* Les images dans les slides */
    .swiper-slide img {
      display: block;
      max-width: 100%;
      height: auto;
    }
  </style>
</head>
<body>

  <!-- Swiper -->
  <div class="swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="https://picsum.photos/id/1015/800/400" alt="Paysage montagne">
      </div>
      <div class="swiper-slide">
        <img src="https://picsum.photos/id/1016/800/400" alt="Paysage lac">
      </div>
      <div class="swiper-slide">
        <img src="https://picsum.photos/id/1018/800/400" alt="Paysage colline">
      </div>
    </div>
    <!-- Flèches -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <!-- Pagination -->
    <div class="swiper-pagination"></div>
  </div>

  <!-- Script Swiper -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    // Important : attendre que le DOM soit chargé
    document.addEventListener('DOMContentLoaded', function() {
      const swiper = new Swiper('.swiper', {
        loop: true,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    });
  </script>
</body>
</html>