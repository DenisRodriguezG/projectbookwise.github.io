const menu = document.querySelector('.menu');
const options = document.querySelector('.options');

const options_ul = document.querySelectorAll('.option');
const pictureOne = document.querySelector('.picture-1');
const pictureTwo = document.querySelector('.picture-2');
const pictureThree = document.querySelector('.picture-3');

const form_suggerens = document.querySelector('.form-suggerens');

const info_coment = document.querySelector('.info-coment');
const suggerens = document.querySelector('.suggerens');

const send_suggerens = document.querySelector('.send-suggerens');
const coment_textarea = document.getElementById('coment-textarea');

const error_coment = document.querySelector('.error');
const p = document.createElement('p');

const thanks = document.querySelector('.thanks');

const books_opcions = document.querySelector('.books-opcions');
const books_gener = document.querySelector('.books-gener');

const contact = document.querySelector('.contact');

menu.addEventListener('click', () => {
    if(options.style.display == 'none')
    {
        options.style.display = 'block';
    }
    else
    {
        options.style.display = 'none';
    }
});

options_ul.forEach( e => {
    console.log(e.textContent)
    e.addEventListener('click', () => {
        if(e.textContent === "Aventura")
        {
            pictureTwo.style.display = 'none';
            pictureThree.style.display = 'none';
            options_ul[1].classList.remove('active');
            options_ul[2].classList.remove('active');
            e.classList.add('active');
            pictureOne.style.display = 'flex';
        }
        else if(e.textContent === "Poema")
        {
            pictureOne.style.display = 'none';
            pictureThree.style.display = 'none';
            options_ul[0].classList.remove('active');
            options_ul[2].classList.remove('active');
            e.classList.add('active');
            pictureTwo.style.display = 'flex';

        }
        else if(e.textContent === "Romance")
        {
            pictureOne.style.display = 'none';
            pictureTwo.style.display = 'none';
            options_ul[0].classList.remove('active');
            options_ul[1].classList.remove('active');
            e.classList.add('active');
            pictureThree.style.display = 'flex';
        }
    });
});

form_suggerens.addEventListener('click', e => {
    e.preventDefault();
    console.log(e);
})

suggerens.addEventListener('click', () => {
    info_coment.style.display = 'block';
});
send_suggerens.addEventListener('click', () => {
    const xml = new XMLHttpRequest();
    xml.open('POST', '../php/coment_users.php', true);
    //xml.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xml.onload = () => {
        let data = xml.response;
        if(data === "space")
        {
            p.innerText = 'Sorry, you need complete all spaces';
            error_coment.appendChild(p);
            error_coment.style.display = 'block';
        }
        else if(data === "success")
        {
            info_coment.style.display = 'none';
            p.innerText = 'Thanks for give your suggerens';
            thanks.appendChild(p);
            thanks.style.display = 'block';
            setTimeout(() => {
                thanks.style.display = 'none';
            }, 3000);
        }
        else
        {
            console.log(data);
        }
    }
    const formData = new FormData(form_suggerens);
    xml.send(formData);
});
coment_textarea.addEventListener('keyup', () => {
    error_coment.style.display = 'none';
});

books_opcions.addEventListener('click', () => {
    if(books_gener.style.display === "none")
    {
        books_gener.style.display = 'block';
    }
    else
    {
        books_gener.style.display = 'none';
    }
});

contact.addEventListener('click',() => {
    options.style.display = 'none';
});
