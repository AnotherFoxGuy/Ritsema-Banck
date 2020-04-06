class popup {
  constructor(json) {
    this.json = json;
    this.inputs = [];
  }

  set image(image) {
    this.image = image;
  }

  generate() {
    var overlay = document.createElement("DIV");
    overlay.classList.add("popup_overlay");
    overlay.id = "overlay";

    var popup = document.createElement("DIV");

    var wrapper = document.createElement("DIV");
    wrapper.classList.add(
      "four",
      "wide",
      "white",
      "rounded",
      "popup",
      "container"
    );
    wrapper.id = "wrapper";

    var container = document.createElement("DIV");
    container.classList.add("ten", "wide", "white", "rounded", "container");
    container.id = "cont";

    var row = document.createElement("DIV");
    row.classList.add("centered", "row");

    var title = document.createElement("H2");
    title.innerHTML = this.json.title;
    row.appendChild(title);

    container.appendChild(row);

    if('description' in this.json){
      var row = document.createElement("DIV");
      row.classList.add("row");

      var description = document.createElement("DIV");
      description.innerHTML = this.json.description;
      row.appendChild(description);

      container.appendChild(row);
    }

    // checks if there are any inputs given. Creates input fields if that is the case
    if ("inputs" in this.json) {
      for (var i = 0; i < this.json.inputs.length; i++) {
        var row = document.createElement("DIV");
        row.classList.add("row");

        var label = document.createElement("LABEL");
        label.innerHTML = this.json.inputs[i].description;

        var input = document.createElement("INPUT");
        input.name = this.json.inputs[i].name;
        input.id = this.json.inputs[i].id;

        row.appendChild(label);
        row.appendChild(input);
        container.appendChild(row);
      }
    }

    // button generation
    var row = document.createElement("DIV");
    row.classList.add("row");

    var button = document.createElement("BUTTON");
    button.classList.add("twelve", "wide", "blue", "bounce", "button");
    button.innerHTML = this.json.button.label;
    button.id = this.json.button.id;

    row.appendChild(button);
    container.appendChild(row);

    // possible error generation
    var row = document.createElement("DIV");
    row.classList.add("row");

    var errorMessage = document.createElement("DIV");
    errorMessage.classList.add("error");
    errorMessage.style.display = "none";
    errorMessage.id = "div_input_error"
    row.appendChild(errorMessage);
    container.appendChild(row);

    wrapper.appendChild(container);
    popup.appendChild(wrapper);
    document.body.appendChild(overlay);
    document.body.appendChild(popup);
    // generating properties which are available outside the class
    this.button = document.getElementById(this.json.button.id);
    this.errorMessage = document.getElementById("div_input_error");
    if ("inputs" in this.json) {
      for (var i = 0; i < this.json.inputs.length; i++) {
        this.inputs.push(document.getElementById(this.json.inputs[i].id));
      }
    }
  }

  close() {
    document.getElementById("wrapper").remove();
    document.getElementById("overlay").remove();
  }

  error(message){
    this.errorMessage.style.display = "block";
    this.errorMessage.innerHTML = message;
  }
}
