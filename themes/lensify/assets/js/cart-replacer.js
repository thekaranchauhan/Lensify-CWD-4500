let variations = document.querySelectorAll('dt');

for (let variation of variations) {
    let text = variation.innerText;
    let newText;
    if (text=="Choose your lens") {
        newText = "Colour:";
    } else if (text=="Choose a color") {
        newText = "Design Colour:";
    } else {
        newText = text.replace("::", ":");
    }
    variation.innerText = newText;
}