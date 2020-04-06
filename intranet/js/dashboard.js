var button = document.getElementById("button_remove_user");

button.addEventListener("click", function(){
      var json = JSON.parse('{"title" : "Gebruiker verwijderen", "description" : "Voer alsublieft de naam in van de gebruiker dit u wilt verwijderen", "inputs" : [{"description" : "E-mailadres", "name" : "input_email", "id" : "input_remove_user"}], "button" : { "label" : "Verstuur", "id" : "button_delete_user" }}');
      var pop = new popup(json);
      pop.generate();

      pop.button.addEventListener("click", function(){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                  if(this.readyState == 4 && this.status == 200){
                        if(this.responseText == "true"){
                              pop.close();
                              var json1 = JSON.parse('{"title" : "Gebruiker verwijderd!", "description" : "U heeft succesvol een gebruiker uit de database verwijderd", "button" : { "label" : "Verstuur", "id" : "button_succeeded" }}');
                              var pop1 = new popup(json1);
                              pop1.generate();

                              pop1.button.addEventListener("click", function(){
                                    pop1.close();
                              });
                        } else {
                              pop.error(JSON.parse(this.responseText));
                        }
                  }
            }
            xhttp.open("POST", "../../requests/user/delete.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("email=" + document.getElementById("input_remove_user").value);
      });
});