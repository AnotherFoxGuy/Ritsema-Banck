document.getElementById("submit").addEventListener("click", function() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "true") {
        animate();
      } else {
        console.log(this.responseText);
        var json = '{"title" : "$s", "button" : { "label" : "Sluiten", "id" : "button_code" }}'.replace(
          "$s",
          this.responseText
        );
        console.log(json);
        pop = new popup(JSON.parse(json));
        pop.generate();

        pop.button.addEventListener("click", function() {
          pop.close();
        });
      }
    }
  };
  xhttp.open("POST", "validation.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(
    "email=" +
      document.getElementById("email").value +
      "&password=" +
      document.getElementById("password").value
  );
});

function animate() {
  var json = JSON.parse(
    '{"title" : "Twee factor authenticatie", "inputs" : [{"description" : "Voer je code in", "name" : "code", "id" : "input_code"}], "button" : { "label" : "Verstuur", "id" : "button_code" }}'
  );
  pop = new popup(json);
  pop.generate();

  pop.button.addEventListener("click", function() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText == "true") {
          pop.close();
          document.location = "../Julian/overview.php";
        }
      }
    };
    xhttp.open("POST", "validation.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("code=" + document.getElementById("input_code").value);
  });
}
