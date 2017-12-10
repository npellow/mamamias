function successMessage(message) {
  if (message === 'Success') {

    setTimeout(function() {
      window.location.reload(true);
    }, 1800000);

    //vars
    var div = document.createElement("div");
    var diva = document.createElement("a");

    //div
    div.innerHTML = " <strong>Success</strong> You are logged in";
    div.classList.add('alert');
    div.classList.add('alert-success');
    div.classList.add('alert-dismissable');
    //diva
    diva.innerHTML = 'x';
    diva.setAttribute('data-dismiss', "alert");
    diva.setAttribute('aria-labe', "close");
    diva.href = '#';
    diva.classList.add('close');
    //add vars to dom
    document.getElementById("mcon").appendChild(div);
    div.appendChild(diva);
    document.getElementById("loggedIn").innerHTML = "";
    div.id = "statusMess0";
    window.setTimeout(function() {
      $("#statusMess0").alert('close');
    }, 2000);



  }
}

function errorMessage(message) {
  if (/Session/.test(window.location.href)) {
    //vars
    var divEr = document.createElement("div");
    var divaEr = document.createElement("a");
    //div
    divEr.innerHTML =
      " <strong>Session invalid</strong> Your Session is terminated";
    divEr.classList.add('alert');
    divEr.classList.add('alert-danger');
    divEr.classList.add('alert-dismissable');
    //diva
    divaEr.innerHTML = 'x';
    divaEr.setAttribute('data-dismiss', "alert");
    divaEr.setAttribute('aria-labe', "close");
    divaEr.href = '#';
    divaEr.classList.add('close');
    //add vars to dom
    document.getElementById("mcon").appendChild(divEr);
    divEr.appendChild(divaEr);
    divEr.id = "statusMess1";
    window.setTimeout(function() {
      $("#statusMess1").alert('close');
    }, 2000);

  }
}

function loginErrorMessage() {
  if (/Invalid/.test(window.location.href)) {
    //vars
    var div = document.createElement("div");
    var diva = document.createElement("a");

    //div
    var errorMess = new URL(window.location.href).searchParams.get("message");

    div.innerHTML = " <b>Login Failed: <i>" + errorMess + "</i></b>";
    div.classList.add('alert');
    div.classList.add('alert-danger');
    div.classList.add('alert-dismissable');
    div.id = "status";

    //diva
    diva.innerHTML = 'x';
    diva.setAttribute('data-dismiss', "alert");
    diva.setAttribute('aria-label', "close");
    diva.href = '#';
    diva.classList.add('close');
    //add vars to dom
    document.getElementById("mcon").appendChild(div);
    div.appendChild(diva);
    window.setTimeout(function() {
      $("#status").alert('close');
    }, 2000);

  }
}

function getPrice(piztype, price, elem) {
  //piztype="cheeseNum" price=10 elem price

  var piztype = document.getElementById(piztype);
  var number = piztype.options[piztype.selectedIndex].value;
  var elem = document.getElementById(elem);
  var total = number * price;
  elem.innerHTML = "Total is $" + total;
}
