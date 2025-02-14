function selectScore(element) {
    // Remove "selected" class from all divs
    document.querySelectorAll(".nutri-score div").forEach(div => div.classList.remove("selected"));

    // Add "selected" class to the clicked div
    element.classList.add("selected");
}