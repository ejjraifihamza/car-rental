const boxes = document.querySelectorAll('.flex')

window.addEventListener('scroll', checkBoxes)

function checkBoxes () {
    const triggerBottom = window.innerHeight / 6 * 4

    boxes.forEach(flex => {
        const boxTop = flex.getBoundingClientRect().top

        if (boxTop < triggerBottom) {
            flex.classList.add('show')
        }
            else {
                flex.classList.remove('show')
            }
    })
}

checkBoxes()