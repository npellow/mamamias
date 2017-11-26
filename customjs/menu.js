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

 