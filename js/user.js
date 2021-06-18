const user_content = document.querySelector('.user-content');

const user_email = document.getElementById('user-email');

const update_user = document.querySelector('.update-user');
const send_updateBtn = document.querySelector('.send-update');

const update_form = document.querySelector('.update-form');

const session_email = document.getElementById('session-email');

const homeE = document.querySelector('.home');

const your_coments = document.querySelector('.your-coments');

const errorE = document.querySelector('.error');

let sessionE = session_email.value;
let user_e = user_email.value;
let temp;
let json;

const showActiveMenu = () => {
    const optionsMenu =  document.querySelectorAll('.item');
    optionsMenu.forEach(() => {
        if(location.pathname === "/bookwise/php/user.php")
        {
            optionsMenu[0].classList.remove('active');
            optionsMenu[1].classList.add('active');
            optionsMenu[2].classList.remove('active');
            optionsMenu[4].classList.remove('active');
        }
    });
}
showActiveMenu();
const showUserInfo = () => {
    const xml = new XMLHttpRequest();
    xml.open('POST', 'getInfo-user.php', true);
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.onload = () => {
        if(xml.DONE === 4)
        {
            if(xml.status === 200)
            {
                let data = JSON.parse(xml.responseText); 

                user_content.innerHTML =  `
                <h4>your information</h4>
                <p><b>Name</b>: ${data.name} ${data.firstname} ${data.lastname}.</p>
                <p><b>Email</b>: ${data.email}.</p>
                <p><b>Age</b>: ${data.age}.</p>
                <p><b>You like to read, because</b>: ${data.reason}.</p>
                <button onclick="showForm()" class="update">Update</button>`;
                
            }
        }
    }
    xml.send(`email=${user_email.value}`);

}



const showForm = () => {
    user_content.style.display = 'none';
    update_user.style.display = 'block';
}
update_form.addEventListener('submit', e => {
    e.preventDefault();
});

send_updateBtn.addEventListener('click', () => {
    const xml = new XMLHttpRequest();
    xml.open('POST', 'update_user.php', true);
    xml.onload = () => {
        let data1 = xml.response;
        if(data1 === "space")
        {
            errorE.innerHTML = "<p>Sorry, you need complete all tha espaces</p>";
            errorE.style.display = 'block';
            setTimeout(() => {
                errorE.style.display = 'none';
            }, 2000);

        }
        else if(data1 === "email")
        {
            errorE.innerHTML = "This email is not correct";
            errorE.style.display = 'block';
            setTimeout(() => {
                errorE.style.display = 'none';
            }, 2000);
        }
        else if(data1 === "exits")
        {
            errorE.innerHTML = "Sorry, email exits";
            errorE.style.display = 'block';
            setTimeout(() => {
                errorE.style.display = 'none';
            }, 2000);
        }
        else
        {
            user_content.style.display = 'block';
            update_user.style.display = 'none';
            temp = data1;
            session_email.value = temp;
            user_email.value = temp;
            console.log(temp);
            showUserInfo();
            history.go();
            console.log(data1);
        }
    }  
    const dataForm = new FormData(update_form);
    xml.send(dataForm);

});
showUserInfo();

homeE.addEventListener('click', () => {
    if(temp != '')
    {
        location.href = `../php/content.php?info=${temp}`;
    }
    else
    {
        location.href = '../php/content.php';
    }
       
        
});

const coments = () => 
{
    const xml = new XMLHttpRequest();
    xml.open('POST', 'all_coments.php',true);
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.onload = () => 
    {
        if(xml.DONE === 4)
        {
            if(xml.status === 200)
            {
                let data3 = xml.response;
                your_coments.innerHTML = data3;
            }
        }

    }
    xml.send('email='+user_email.value);
}
coments();
console.log(user_email.value)
/*let jsonString = '{"name": "Denis", "lastname": "Perez"}';
let json = JSON.parse(jsonString);
console.log(json);*/