//calc cheese pizza
$(document).ready(function() {
  $('select').on('change', function() {
    $('.resultCheese').text(
      $('select[id=cheeseNum]').val() * 10);
  });
});


//calc pep pizza
$(document).ready(function() {
  $('select').on('change', function() {
    $('.resultPep').text(
      $('select[id=pepNum]').val() * 12);
  });
});

//calc sausage pizza
$(document).ready(function() {
  $('select').on('change', function() {
    $('.resultSausage').text(
      $('select[id=sausageNum]').val() * 12);
  });
});

//calc veg pizza
$(document).ready(function() {
  $('select').on('change', function() {
    $('.resultVeg').text(
      $('select[id=vegNum]').val() * 13);
  });
});



function displayOnCartCheese() {
  var cheeseTotals = document.getElementById("resultCheese").innerHTML;
  localStorage.setItem("CheeseTotals", cheeseTotals);
  if (!Number(localStorage.getItem("CheeseTotals")) == 0) {
    alert('item added please check the cart');
  }

}

function displayOnCartPepp() {
  var PeppTotals = document.getElementById("Pepp").innerHTML;
  localStorage.setItem("PeppTotals", PeppTotals);
  if (!Number(localStorage.getItem("PeppTotals")) == 0) {
    alert('item added please check the cart');

  }
}

function displayOnCartVeg() {
  var vegTotals = document.getElementById("veg").innerHTML;
  localStorage.setItem("vegTotals", vegTotals);
  if (!Number(localStorage.getItem("vegTotals")) == 0) {
    alert('item added please check the cart');
  }

}

function displayOnCartSausage() {
  var sausageTotals = document.getElementById("sausage").innerHTML;
  localStorage.setItem("sausageTotals", sausageTotals);
  if (!Number(localStorage.getItem("sausage")) == 0) {
    alert('item added please check the cart');

  }
}
