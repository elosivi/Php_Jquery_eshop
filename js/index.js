
// var instance = M.Parallax.getInstance(elem);


// Or with jQuery

$(document).ready(function(){
  $('.parallax').parallax();
  $('select').formSelect();
  $('.modal').modal();

  // var sel = document.getElementById('sort_select');
  document.getElementById('sort_articles').onclick = function() {
    var sort_sel = document.getElementById("sort_select");
    if (sort_sel.value == "price_incr") {
      mySortByPrice(true);
    } else if (sort_sel.value == "price_decr") {
      mySortByPrice(false);
    } else if (sort_sel.value == "alph_incr") {
      mySortByName(true);
    } else if (sort_sel.value == "alph_decr") {
      mySortByName(false);
    }
    var category_sel = document.getElementById("category_select");
    mySortCategory(category_sel.value);
  }
});

function mySearchByName() {
  var article, filter, cards, i, txtValue;
  input = document.getElementById("search_filter");
  filter = input.value.toUpperCase();
  cards = document.getElementsByClassName("articles-card");
  for (i = 0; i < cards.length; i++) {
    // console.log(articles);
    article = cards[i].getElementsByClassName("article-name")[0];
    txtValue = article.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
        cards[i].parentNode.style.display = "";
    } else {
      cards[i].parentNode.style.display = "none";
    }
  }

  cards = document.getElementsByClassName("articles-card");
  items = Array.prototype.slice.call(cards);

  // Now we can sort it.  Sort alphabetically
  items.sort(function(a, b){
    if (a.parentNode.style.display == "none") {
    }
    if (b.parentNode.style.display == "none" && a.parentNode.style.display == "") {
      return -1;
    }
    return 0;
  });
}

function mySortByPrice(increasingly) {
  cards = document.getElementsByClassName("articles-card");
  items = Array.prototype.slice.call(cards);

  // Now we can sort it.  Sort alphabetically
  items.sort(function(a, b){
    if (increasingly) {
      return (parseInt(a.getElementsByClassName("card-price")[0].innerText) - parseInt(b.getElementsByClassName("card-price")[0].innerText));
    } else {
      return (parseInt(b.getElementsByClassName("card-price")[0].innerText) - parseInt(a.getElementsByClassName("card-price")[0].innerText));
    }
  });

// reatach the sorted elements
  for(var i = 0, len = items.length; i < len; i++) {
    // store the parent node so we can reatach the item
    var parent = items[i].parentNode.parentNode;
    // detach it from wherever it is in the DOM
    var detatchedItem = parent.removeChild(items[i].parentNode);
    // reatach it.  This works because we are itterating
    // over the items in the same order as they were re-
    // turned from being sorted.
    parent.appendChild(detatchedItem);
  }
}

function mySortByName(increasingly) {
  cards = document.getElementsByClassName("articles-card");
  items = Array.prototype.slice.call(cards);

  // Now we can sort it.  Sort alphabetically
  items.sort(function(a, b){
    if (increasingly) {
      return (a.getElementsByClassName("article-name")[0].innerText.localeCompare(b.getElementsByClassName("article-name")[0].innerText));
    } else {
      return (b.getElementsByClassName("article-name")[0].innerText.localeCompare(a.getElementsByClassName("article-name")[0].innerText));
    }
  });

// reatach the sorted elements
  for(var i = 0, len = items.length; i < len; i++) {
    // store the parent node so we can reatach the item
    var parent = items[i].parentNode.parentNode;
    // detach it from wherever it is in the DOM
    var detatchedItem = parent.removeChild(items[i].parentNode);
    // reatach it.  This works because we are itterating
    // over the items in the same order as they were re-
    // turned from being sorted.
    parent.appendChild(detatchedItem);
  }
}

function mySortCategory(category_id) {
  var catId = "art-cat-" + category_id;

  cards = document.getElementsByClassName("articles-card");
  cardsToDisplay = document.getElementsByClassName(catId);

  items = Array.prototype.slice.call(cards);
  itemsToDisplay = Array.prototype.slice.call(cardsToDisplay);


  for (i = 0; i < items.length; i++) {
    if (itemsToDisplay.includes(items[i]) || itemsToDisplay.length == 0){
      items[i].parentNode.style.display="";
    }
    else {
      items[i].parentNode.style.display = "none";
    }
  }
    
  //   // console.log(articles);
  //   article = cards[i].getElementsByClassName("article-name")[0];
  //   txtValue = article.innerText;
  //   if (txtValue.toUpperCase().indexOf(filter) > -1) {
  //       cards[i].parentNode.style.display = "";
  //   } else {
  //     cards[i].parentNode.style.display = "none";
  //   }
  // }

  // cards = document.getElementsByClassName("articles-card");
  // items = Array.prototype.slice.call(cards);

  // // Now we can sort it.  Sort alphabetically
  // items.sort(function(a, b){
  //   if (a.parentNode.style.display == "none") {
  //   }
  //   if (b.parentNode.style.display == "none" && a.parentNode.style.display == "") {
  //     return -1;
  //   }
  //   return 0;
  // });
}