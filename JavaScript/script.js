let randomSentenceElement = document.getElementById('randomSentence');
const randomSentences = ['El local de tus sueños te espera...', 'El apartamento de tus sueños te espera...'];
let currentIndex = 0;
let currentText = '';
let isDeleting = false;
let typingSpeed = 30;
let deleteSpeed = 15;

function type() {
    if (currentIndex >= randomSentences.length) {
        currentIndex = 0;
    }

    const fullText = randomSentences[currentIndex];

    if (isDeleting) {
        currentText = fullText.substring(0, currentText.length - 1);
    } else {
        currentText = fullText.substring(0, currentText.length + 1);
    }

    randomSentenceElement.innerHTML = currentText;

    let typeSpeed = isDeleting ? deleteSpeed : typingSpeed;

    if (!isDeleting && currentText === fullText) {
        typeSpeed = 2000;
        isDeleting = true;
    } else if (isDeleting && currentText === '') {
        isDeleting = false;
        currentIndex++;
    }

    setTimeout(type, typeSpeed);
}
type();
