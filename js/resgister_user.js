const errorE = document.querySelector('.error');
const p = document.createElement('p');

//data users
const formE = document.querySelector('.data');
const dataUserE = document.querySelectorAll('.value');

const sendE = document.getElementById('send');

send.addEventListener('click', () => {
    
    const xml = new XMLHttpRequest();
    xml.open('POST', 'php/register_user.php', true);

    xml.onload = () => {
        if(xml.readyState === XMLHttpRequest.DONE)
        {
            if(xml.status === 200)
            {
                let data = xml.response;
                if(data == "space")
                {
                    p.innerText = "Sorry, you need complete all the spaces";
                    errorE.appendChild(p);
                    errorE.style.display = 'block';
                    //location.href = 'index.html';
                }
                else if(data == "emailI")
                {
                    p.innerText = "Sorry, ERROR... this email is invalidate";
                    errorE.appendChild(p);
                    errorE.style.display = 'block';
                    //location.href = 'index.html';            
                }
                else if(data == "exits")
                {
                    p.innerText = "Sorry, the email exist";
                    errorE.appendChild(p);
                    errorE.style.display = 'block';
                }
                else
                {
                    console.log(data);
                    location.href = 'index.html';
                }
               
            }
        }
    }
    const formData = new FormData(formE);
    xml.send(formData);
});

dataUserE.forEach(e => {
    e.addEventListener('keyup', () => {
        errorE.style.display = 'none';
    });
});