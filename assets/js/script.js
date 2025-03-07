function changeView() {
  var signUpBox = document.getElementById("signUpBox");
  var signInBox = document.getElementById("signInBox");

  signUpBox.classList.toggle("d-none");
  signInBox.classList.toggle("d-none");
}

var m;
function show() {
  var Modal = document.getElementById("Modal");
  m = new bootstrap.Modal(Modal);
  m.show();
}

function signUp() {
  var f = document.getElementById("f").value;
  var l = document.getElementById("l").value;
  var e = document.getElementById("e").value;
  var p = document.getElementById("p").value;
  var m = document.getElementById("m").value;
  var g = document.getElementById("g").value;

  var obj = {
    fname: f,
    lname: l,
    email: e,
    password: p,
    mobile: m,
    gender: g,
  };

  var json = JSON.stringify(obj);

  var form = new FormData();
  form.append("json", json);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var text = request.responseText;
      if (text == "success") {
        document.getElementById("msg").innerHTML = text;
        window.location.reload();
      } else {
        document.getElementById("msg").innerHTML = text;
      }
    }
  };

  request.open("POST", "signUpProcess.php", true);
  request.send(form);
}

function signIn() {
  var emailS = document.getElementById("emailSignIn").value;
  var passwordS = document.getElementById("passwordSignIn").value;
  var rememberme = document.getElementById("rememberme").checked;

  var obj = {
    e: emailS,
    p: passwordS,
    rme: rememberme,
  };

  var json = JSON.stringify(obj);

  var f = new FormData();
  f.append("json", json);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "home.php";
      } else {
        document.getElementById("msg2").innerHTML = t;
      }
    }
  };

  r.open("POST", "signInProcess.php", true);
  r.send(f);
}

function signout() {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "index.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "signoutProcess.php", true);
  r.send();
}

function forgotPassword() {
  var forgotPassword = document.getElementById("forgotPassword");
  var signInBox = document.getElementById("signInBox");
  var email = document.getElementById("emailSignIn").value;

  if (email == 0) {
    document.getElementById("msg2").innerHTML = "Please enter your Email";
  } else {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
      if ((r.readyState == 4) & (r.status == 200)) {
        var t = r.responseText;
        if (t == "Success") {
          forgotPassword.classList.toggle("d-none");
          signInBox.classList.toggle("d-none");
          document.getElementById("fms").innerHTML =
            "Verification code has sent to your email. Please check your inbox";
        } else {
          document.getElementById("msg2").innerHTML = t;
        }
      }
    };

    r.open("GET", "forgotPasswordProcess.php?e=" + email, true);
    r.send();
  }
}

function showPassword1() {
  var i = document.getElementById("npi");
  var eye = document.getElementById("e1");

  if (i.type == "password") {
    i.type = "text";
    eye.className = "bi bi-eye-fill";
  } else {
    i.type = "password";
    eye.className = "bi bi-eye-slash-fill";
  }
}

function showPassword2() {
  var i = document.getElementById("rnp");
  var eye = document.getElementById("e2");

  if (i.type == "password") {
    i.type = "text";
    eye.className = "bi bi-eye-fill";
  } else {
    i.type = "password";
    eye.className = "bi bi-eye-slash-fill";
  }
}

function resetpw() {
  var email = document.getElementById("emailSignIn").value;
  var np = document.getElementById("npi").value;
  var rnp = document.getElementById("rnp").value;
  var vcode = document.getElementById("vc").value;

  var obj = {
    e: email,
    np: np,
    rnp: rnp,
    vcode: vcode,
  };

  var json = JSON.stringify(obj);

  var f = new FormData();
  f.append("json", json);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "success") {
        document.getElementById("fms").innerHTML = "Password reset success";
        m.hide();
        window.location.reload();
      } else {
        document.getElementById("fms").innerHTML = t;
      }
    }
  };

  r.open("POST", "resetPassword.php", true);
  r.send(f);
}

function cart() {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "Please Sign In or Register") {
        show();
      } else {
        window.location = "cart.php";
      }
    }
  };

  r.open("GET", "cart.php", true);
  r.send();
}

function addToCart(id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "Please Sign In or Register.") {
        show();
      } else if (t == "Product Updated") {
        window.location.reload();
      } else if (t == "Product added successfully") {
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "addToCartProcess.php?id=" + id, true);
  r.send();
}

function deleteFromCart(id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "success") {
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "deleteFromCartProcess.php?id=" + id, true);
  r.send();
}

function watchlist() {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "Please Sign In or Register") {
        show();
      } else {
        window.location = "watchlist.php";
      }
    }
  };

  r.open("GET", "cart.php", true);
  r.send();
}

function addToWatchlist(id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "removed") {
        window.location.reload();
      } else if (t == "added") {
        window.location.reload();
      } else if (t == "Please Login First") {
        show();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "addToWatchlistProcess.php?id=" + id, true);
  r.send();
}

function removeFromWatchlist(id1) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "success") {
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "removeWatchlistProcess.php?id=" + id1, true);
  r.send();
}

function moveToCart(id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "Please Sign In or Register.") {
        show();
      } else if (t == "Product Updated") {
        window.location.reload();
      } else if (t == "Product added successfully") {
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "moveToCartProcess.php?id=" + id, true);
  r.send();
}

function changeImage() {
  var view = document.getElementById("viewImg");
  var file = document.getElementById("imageuploader");

  file.onchange = function () {
    var file1 = this.files[0];
    var url = window.URL.createObjectURL(file1);
    view.src = url;
  };
}

function updateProfile() {
  var fname = document.getElementById("fn").value;
  var lname = document.getElementById("ln").value;
  var mobile = document.getElementById("mobile").value;
  var line1 = document.getElementById("line1").value;
  var line2 = document.getElementById("line2").value;
  var image = document.getElementById("imageuploader");

  var obj = {
    fn: fname,
    ln: lname,
    mobile: mobile,
    l1: line1,
    l2: line2,
  };

  var json = JSON.stringify(obj);

  var f = new FormData();
  f.append("json", json);

  if (image.files.length == 0) {
    var confirmation = confirm(
      "Are you sure You don't want to update Profile Image?"
    );

    if (confirmation) {
      alert("you have not selected any image.");
    }
  } else {
    f.append("image", image.files[0]);
  }

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "success") {
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "updateProfileProcess.php", true);
  r.send(f);
}

function basicSearch(x) {
  var txt = document.getElementById("basic_search_txt").value;
  // var select = document.getElementById("basic_search_select").value;

  var obj = {
    t: txt,
    p: x,
  };

  var json = JSON.stringify(obj);

  var f = new FormData();
  f.append("json", json);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      document.getElementById("SearchResult").innerHTML = t;
    }
  };

  r.open("POST", "basicSearchProcess.php", true);
  r.send(f);
}

function allProduct(id, x) {
  var obj = {
    id: id,
    p: x,
  };

  var json = JSON.stringify(obj);

  var f = new FormData();
  f.append("json", json);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      document.getElementById("allProduct").innerHTML = t;
    }
  };

  r.open("POST", "allProductProcess.php", true);
  r.send(f);
}

function adminVerification() {
  var Verify = document.getElementById("Verify");
  var signInBox = document.getElementById("signInBox");
  var e = document.getElementById("adminEmail").value;

  var obj = {
    email: e,
  };

  var json = JSON.stringify(obj);

  var f = new FormData();
  f.append("json", json);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "Success") {
        Verify.classList.toggle("d-none");
        signInBox.classList.toggle("d-none");
      } else {
        document.getElementById("msg2").innerHTML = t;
      }
    }
  };

  r.open("POST", "adminVerificationProcess.php", true);
  r.send(f);
}

function verify() {
  var verification = document.getElementById("vcode");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "adminPanel.php";
      } else {
        document.getElementById("msg").innerHTML = t;
      }
    }
  };

  r.open("GET", "verificationProcess.php?v=" + verification.value, true);
  r.send();
}

function adminSignout() {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "adminLogIn.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "adminSignoutProcess.php", true);
  r.send();
}

var am;
function show1() {
  var Lan = document.getElementById("Language").value;
  var alert = document.getElementById("alert");

  if (Lan == 0) {
    alert.classList.toggle("d-none");
    document.getElementById("msg").innerHTML = "Enter Value";
  } else {
    document.getElementById("msg2").innerHTML = Lan;
    var adminVerificationModal = document.getElementById("addModal");
    am = new bootstrap.Modal(adminVerificationModal);
    am.show();
  }
}

function show2() {
  var Aut = document.getElementById("Author").value;
  var alert = document.getElementById("alert");

  if (Aut == 0) {
    alert.classList.toggle("d-none");
    document.getElementById("msg").innerHTML = "Enter Value";
  } else {
    document.getElementById("msg2").innerHTML = Aut;
    var adminVerificationModal = document.getElementById("addModal");
    am = new bootstrap.Modal(adminVerificationModal);
    am.show();
  }
}

function show3() {
  var Pub = document.getElementById("Publisher").value;
  var alert = document.getElementById("alert");

  if (Pub == 0) {
    alert.classList.toggle("d-none");
    document.getElementById("msg").innerHTML = "Enter Value";
  } else {
    document.getElementById("msg2").innerHTML = Pub;
    var adminVerificationModal = document.getElementById("addModal");
    am = new bootstrap.Modal(adminVerificationModal);
    am.show();
  }
}

function show4() {
  var Pub = document.getElementById("category").value;
  var alert = document.getElementById("alert");

  if (Pub == 0) {
    alert.classList.toggle("d-none");
    document.getElementById("msg").innerHTML = "Enter Value";
  } else {
    document.getElementById("msg2").innerHTML = Pub;
    var adminVerificationModal = document.getElementById("addModal");
    am = new bootstrap.Modal(adminVerificationModal);
    am.show();
  }
}

function Add() {
  var Lan = document.getElementById("Language").value;
  var Aut = document.getElementById("Author").value;
  var Pub = document.getElementById("Publisher").value;
  var cat = document.getElementById("category").value;

  var obj = {
    l: Lan,
    a: Aut,
    p: Pub,
    c: cat,
  };

  var json = JSON.stringify(obj);

  var f = new FormData();
  f.append("json", json);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "added") {
        window.location.reload();
      } else {
        document.getElementById("msg3").innerHTML = t;
      }
    }
  };

  r.open("POST", "addDetails.php", true);
  r.send(f);
}

// var qt;
// function qty(id){
//   var adminVerificationModal = document.getElementById("qtymodel");
//     qt = new bootstrap.Modal(adminVerificationModal);
//     qt.show();

//     // var obj = {
//   //   q: q,
//   //   id: id,
//   // };

//   // var json = JSON.stringify(obj);

//   // var f = new FormData();
//   // f.append("json", json);

//   // var r = new XMLHttpRequest();

//   // r.onreadystatechange = function () {
//   //   if ((r.readyState == 4) & (r.status == 200)) {
//   //     var t = r.responseText;
//   //     // if (t == "added") {
//   //     //   window.location.reload();
//   //     // } else {
//   //     //   document.getElementById("msg2").innerHTML = t;
//   //     // }
//   //     alert(t);
//   //   }
//   // };

//   // r.open("POST", "bookUpdate.php", true);
//   // r.send(f);
// }

// function hi(id){
//   alert(id);
// }

// function bookUpdate(id){
// //  var q = document.getElementById("qty").value;
//  alert(id);

//   // var obj = {
//   //   q: q,
//   //   id: id,
//   // };

//   // var json = JSON.stringify(obj);

//   // var f = new FormData();
//   // f.append("json", json);

//   // var r = new XMLHttpRequest();

//   // r.onreadystatechange = function () {
//   //   if ((r.readyState == 4) & (r.status == 200)) {
//   //     var t = r.responseText;
//   //     // if (t == "added") {
//   //     //   window.location.reload();
//   //     // } else {
//   //     //   document.getElementById("msg2").innerHTML = t;
//   //     // }
//   //     alert(t);
//   //   }
//   // };

//   // r.open("POST", "bookUpdate.php", true);
//   // r.send(f);
// }

function addProduct() {
  var title = document.getElementById("title").value;
  var category = document.getElementById("cate").value;
  var language = document.getElementById("lan").value;
  var author = document.getElementById("aut").value;
  var pub = document.getElementById("publi").value;
  var qty = document.getElementById("qty").value;
  var paper = document.getElementById("paper").value;
  var price = document.getElementById("price").value;
  var delivery = document.getElementById("dCost").value;
  var image = document.getElementById("imageuploader");

  var obj = {
    title: title,
    category: category,
    language: language,
    author: author,
    publi: pub,
    qty: qty,
    paper: paper,
    price: price,
    delivery: delivery,
  };

  var json = JSON.stringify(obj);

  var f = new FormData();

  f.append("json", json);

  if (image.files.length == 0) {
    document.getElementById("Fill1").innerHTML = "sd";
  } else {
    f.append("image", image.files[0]);
  }

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "Product saved successfully") {
        window.location.reload();
      }
      document.getElementById("Fill1").innerHTML = t;
    }
  };

  r.open("POST", "addProductProcess.php", true);
  r.send(f);
}

function adminSearch() {
  var txt = document.getElementById("admin_search").value;

  var obj = {
    t: txt,
  };

  var json = JSON.stringify(obj);

  var f = new FormData();
  f.append("json", json);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      document.getElementById("adminSearchResult").innerHTML = t;
    }
  };

  r.open("POST", "adminSearchProcess.php", true);
  r.send(f);
}

function adminUserSearch() {
  var txt = document.getElementById("adminUserSearch").value;

  var obj = {
    t: txt,
  };

  var json = JSON.stringify(obj);

  var f = new FormData();
  f.append("json", json);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      document.getElementById("adminSearchResult").innerHTML = t;
    }
  };

  r.open("POST", "adminUserSearchProcess.php", true);
  r.send(f);
}

function stockSearch() {
  var txt = document.getElementById("stockSearch").value;

  var obj = {
    t: txt,
  };

  var json = JSON.stringify(obj);

  var f = new FormData();
  f.append("json", json);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      document.getElementById("adminSearchResult").innerHTML = t;
    }
  };

  r.open("POST", "stockSearchProcess.php", true);
  r.send(f);
}

function blockUser(email) {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var txt = request.responseText;
      if (txt == "blocked") {
        document.getElementById("ub" + email).innerHTML = "Unblock";
        document.getElementById("ub" + email).classList = "btn btn-success";
      } else if (txt == "unblocked") {
        document.getElementById("ub" + email).innerHTML = "Block";
        document.getElementById("ub" + email).classList = "btn btn-danger";
      } else {
        alert(txt);
      }
    }
  };

  request.open("GET", "userBlockProcess.php?email=" + email, true);
  request.send();
}

function blockProduct(id) {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var txt = request.responseText;
      if (txt == "blocked") {
        document.getElementById("pb" + id).innerHTML = "Unblock";
        document.getElementById("pb" + id).classList = "btn btn-success";
      } else if (txt == "unblocked") {
        document.getElementById("pb" + id).innerHTML = "Block";
        document.getElementById("pb" + id).classList = "btn btn-danger";
      } else {
        alert(txt);
      }
    }
  };

  request.open("GET", "productBlockProcess.php?id=" + id, true);
  request.send();
}

function checkValue(qty) {
  var input = document.getElementById("qty_input");

  if (input.value <= 0) {
    alert("Quantity must be 1 or more");
    input.value = 1;
  } else if (input.value > qty) {
    alert("Maximum quantity achived");
    input.value = qty;
  }
}

function qty_inc(qty) {
  var input = document.getElementById("qty_input");
  if (input.value < qty) {
    var newValue = parseInt(input.value) + 1;
    input.value = newValue.toString();
  } else {
    alert("Maximum quantity has achieved");
    input.value = qty;
  }
}

function qty_dec() {
  var input = document.getElementById("qty_input");
  if (input.value > 1) {
    var newValue = parseInt(input.value) - 1;
    input.value = newValue.toString();
  } else {
    alert("Minimum quantity has achieved");
    input.value = 1;
  }
}

function payNow(id) {
  var qty = document.getElementById("qty_input").value;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      var obj = JSON.parse(t);

      var mail = obj["mail"];
      var amount = obj["amount"];

      if (t == "1") {
        show();
      } else if (t == "2") {
        alert("Please update your profile first");
        window.location = "Profile.php";
      } else {
        // Payment completed. It can be a successful failure.
        payhere.onCompleted = function onCompleted(orderId) {
          console.log("Payment completed. OrderID:" + orderId);
          saveInvoice(orderId, id, mail, amount, qty);
          // Note: validate the payment and show success or failure page to the customer
        };

        // Payment window closed
        payhere.onDismissed = function onDismissed() {
          // Note: Prompt user to pay again or show an error page
          console.log("Payment dismissed");
        };

        // Error occurred
        payhere.onError = function onError(error) {
          // Note: show an error page
          console.log("Error:" + error);
        };

        // Put the payment variables here
        var payment = {
          sandbox: true,
          merchant_id: "1221063", // Replace your Merchant ID
          return_url: "http://localhost/viva/singleProductView.php?id" + id, // Important
          cancel_url: "http://localhost/viva/singleProductView.php?id" + id, // Important
          notify_url: "http://sample.com/notify",
          order_id: obj["id"],
          items: obj["item"],
          amount: amount,
          currency: "LKR",
          hash: obj["hash"],
          first_name: obj["fname"],
          last_name: obj["lname"],
          email: mail,
          phone: obj["mobile"],
          address: obj["address"],
          city: obj["city"],
          country: "Sri Lanka",
          delivery_address: obj["address"],
          delivery_city: obj["city"],
          delivery_country: "Sri Lanka",
          custom_1: "",
          custom_2: "",
        };

        // Show the payhere.js popup, when "PayHere Pay" is clicked
        // document.getElementById('payhere-payment').onclick = function (e) {
        payhere.startPayment(payment);
        // };
      }
    }
  };

  r.open("GET", "buyNowProcess.php?id=" + id + "&qty=" + qty, true);
  r.send();
}

function saveInvoice(orderId, id, mail, amount, qty) {
  var f = new FormData();
  f.append("o", orderId);
  f.append("i", id);
  f.append("m", mail);
  f.append("a", amount);
  f.append("q", qty);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "1") {
        window.location = "invoice.php?id=" + orderId;
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "saveInvoice.php", true);
  r.send(f);
}

function printInvoice() {
  var body = document.body.innerHTML;
  var page = document.getElementById("page").innerHTML;

  document.body.innerHTML = page;
  window.print();
  document.body.innerHTML = body;
}

function cartNum(id){
  var check = document.getElementById("check").checked;
  var cart_qty = document.getElementById("cart_qty").value;

  var obj = {
    id: id,
    c: check,
    cart: cart_qty,
  };

  var json = JSON.stringify(obj);

  var f = new FormData();
  f.append("json", json);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      alert(t);

    }
  };

  r.open("POST", "cartQtyProcess.php", true);
  r.send(f);
}