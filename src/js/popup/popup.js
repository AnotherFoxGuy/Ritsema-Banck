class popup {

  constructor(json) {
    this.json = json;
    this.inputs = [];
  }

  set image(image) { this.image = image; }

  generate() {
    var overlay = document.createElement("DIV");
    overlay.classList.add("popup_overlay");
    overlay.id = "overlay";

    var popup = document.createElement("DIV");

    var wrapper = document.createElement("DIV");
    wrapper.classList.add("four", "wide", "white", "rounded", "popup",
                          "container");
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

    if ('inputs' in this.json) {
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

    var row = document.createElement("DIV");
    row.classList.add("row");

    var button = document.createElement("BUTTON");
    button.classList.add("twelve", "wide", "blue", "bounce", "button");
    button.innerHTML = this.json.button.label;
    button.id = this.json.button.id;

    row.appendChild(button);
    container.appendChild(row);

    wrapper.appendChild(container);
    popup.appendChild(wrapper);
    document.body.appendChild(overlay);
    document.body.appendChild(popup);

    this.button = document.getElementById(this.json.button.id);
    if ('inputs' in this.json) {
      for (var i = 0; i < this.json.inputs.length; i++) {
        this.inputs.push(document.getElementById(this.json.inputs[i].id));
      }
    }
  }

  action(action) {
    switch (action) {
    case "fade":
      this.button.addEventListener("click", this.fade);
      break;
    case "close":
      this.button.addEventListener("click", this.close);
      break;
    default:
      alert("Default");
      break;
    }
  }

  update(title, description, button, subscription) {
    this.titleText = title;
    this.descriptionText = description;
    this.buttonText = button;
    this.subscriptionText = subscription;
  }

  swipe() {
    this.cont.classList.add("swipe_right");
    this.header.innerHTML = this.titleText;
    this.description.innerHTML = this.descriptionText;
    this.button.innerHTML = this.buttonText;
    this.subscription.innerHTML = this.subscriptionText;
  }

  close() {
    document.getElementById("wrapper").remove();
    document.getElementById("overlay").remove();
  }
}