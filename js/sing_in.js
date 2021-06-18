
const form = document.getElementById('form');
const send = document.getElementById('send');

const emailE = document.getElementById('email');
const passwordE = document.getElementById('password');

const errorE = document.querySelector('.error');
const p = document.createElement('p');

form.addEventListener('submit', (e) => {

    e.preventDefault();

});

send.addEventListener('click', () => {

    const xml = new XMLHttpRequest();
    xml.open('POST', 'php/sing_in.php', true);
    //xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.onload = () => {
        if(xml.readyState === XMLHttpRequest.DONE)
        {
            if(xml.status === 200)
            {
                let data = xml.response;
                if(data === "success")
                {
                    location.href = 'php/content.php';
                }
                else
                {
                   p.innerText = data;
                   errorE.appendChild(p);
                   errorE.style.display = 'block';
                }
            }
            else
            {
                console.log('Aguanta')
            }
            
        }
        else
        {
            console.log('bad')
        }
    }

    //we have to send the form data through ajax to php
    let formData = new FormData(form);//creating new formData Object
    xml.send(formData);

});

passwordE.addEventListener('keyup', () => {
    errorE.style.display = 'none';
});

