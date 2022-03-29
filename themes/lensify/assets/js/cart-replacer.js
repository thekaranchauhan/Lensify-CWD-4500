window.onload = function() {
    let variations = document.querySelectorAll('dt');

    for (let variation of variations) {
        let text = variation.innerText;
        let newText;
        if (text=="Choose a frame for your lens") {
            newText = "Frame";
        } else if (text=="Choose a colour for your lens") {
            newText = "Color";
        } else if (text=="Choose a lens:") {
            newText = "Lens";
        } else {
            newText = text.replace("::", ":");
        }
        variation.innerText = newText;
    }
}