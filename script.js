/*__________ Fonction qui redirige vers la fleur ayant l'id récupéré __________*/

const productLinks = document.querySelectorAll('.product-link');
productLinks.forEach(link => {
  link.addEventListener('click', (event) => {
    event.preventDefault(); // empêche le comportement par défaut du lien
    const productId = link.dataset.productid;
    window.location.href = 'fleur.php?productid=' + productid;
  });
});


/*__________ Fonction de survol des cartes lorsque la souris est dessus __________*/

$(document).ready(function() {
  $('.product-card').on('mouseover', function() {
      console.log('Mouse entered');
      $(this).addClass('hovered');
  });
  $('.product-card').on('mouseout', function() {
      console.log('Mouse outered');
      $(this).removeClass('hovered');
  });
});


/*__________ Fonction pour cocher/décocher ou garder cocher une case (prix croissant ou décroissant) __________*/

window.onload = function() {
  let sortPriceAsc = document.getElementById("sort-price-asc");
  let sortPriceDesc = document.getElementById("sort-price-desc");
  
  if (localStorage.getItem("sort-price-asc") === "checked") {
    sortPriceAsc.checked = true;
    sortPriceDesc.checked = false;
  } else if (localStorage.getItem("sort-price-desc") === "checked") {
    sortPriceDesc.checked = true;
    sortPriceAsc.checked = false;
  } else {
    sortPriceAsc.checked = false;
    sortPriceDesc.checked = false;
  }
  
  sortPriceAsc.addEventListener("change", function() {
    if (sortPriceAsc.checked) {
      localStorage.setItem("sort-price-asc", "checked");
      localStorage.removeItem("sort-price-desc");
      sortPriceDesc.checked = false;
    } else {
      localStorage.removeItem("sort-price-asc");
    }
  });
  
  sortPriceDesc.addEventListener("change", function() {
    if (sortPriceDesc.checked) {
      localStorage.setItem("sort-price-desc", "checked");
      localStorage.removeItem("sort-price-asc");
      sortPriceAsc.checked = false;
    } else {
      localStorage.removeItem("sort-price-desc");
    }
  });
};

/*__________ Fonction qui filtre les bouquets (anniversaire, mariage etc) __________*/
  let filterAnniversaire = document.getElementById("filter-anniversaire");
  let filterMariage = document.getElementById("filter-mariage");

  filterAnniversaire.addEventListener("change", function() {
    if (filterAnniversaire.checked) {
      window.location.href = "?sort=anniversaire";
    } else {
      window.location.href = "?sort=default";
    }
  });

  filterMariage.addEventListener("change", function() {
    if (filterMariage.checked) {
      window.location.href = "?sort=mariage";
    } else {
      window.location.href = "?sort=default";
    }
  });
