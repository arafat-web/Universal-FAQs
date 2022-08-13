let faq = document.getElementsByClassName("faq-page");
let i;

for (i = 0; i < faq.length; i++) {
    faq[i].addEventListener("click", function () {
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        let body = this.nextElementSibling;
        if (body.style.maxHeight) {
            body.style.maxHeight = null;
        } else {
            body.style.maxHeight = body.scrollHeight + "px";
        }


    });
}