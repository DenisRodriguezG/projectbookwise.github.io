const itemMenu = document.querySelectorAll('.item');

const form_favorite = document.querySelectorAll('.form-favorite');
const checkbox = document.querySelectorAll('.checkbox');
const file = document.getElementById('file')

const sinopsisBtn = document.querySelectorAll('.sinopsis');
const info_book = document.querySelector('.info-book');
const hiddenBtn = document.querySelector('.hidden');

itemMenu.forEach(() => {
    if(location.pathname)
    {
        itemMenu[0].classList.remove('active');
        itemMenu[2].classList.add('active');
    }
});

/*form_favorite.addEventListener('submit', e => {
    e.preventDefault();
});*/

const get_favorite_books = (value, e) => {
    const xml = new XMLHttpRequest();
    xml.open('POST', 'get_favorite_books.php', true);
    //xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.onload = () => {
        if(xml.readyState === XMLHttpRequest.DONE)
        {
            if(xml.status === 200)
            {
                let data = xml.response;
                if(data === "found")
                {
                    e.checked = true;
                }
                else
                {
                    e.checked = false;
                }
            }
        }
    }
    const formData = new FormData(value);
    xml.send(formData);
} 

checkbox.forEach(e => {
    console.log(e.checked)
    get_favorite_books(e.parentNode, e);
    e.addEventListener('click', () => {
     addFavorite(e.checked, e.parentNode);
    });
});

const addFavorite = (value, form) => {
    console.log(value)
    const xml = new XMLHttpRequest();
 
    xml.open('POST', 'set_favorite_books.php', true);

    xml.onload = () => {
        if(xml.readyState === XMLHttpRequest.DONE)
        {
            if(xml.status === 200)
            {
                let data = xml.response;
                if(data === "added")
                {
                    console.log(data);
                }
                else
                {
                    console.log("deleted");
                }
            }
        }
    }
    const dataForm = new FormData(form);
    xml.send(dataForm);
}

sinopsisBtn.forEach(e => {
    e.addEventListener('click', () => {
        info_book.style.display = 'block';
    });
});
hiddenBtn.addEventListener('click', () => {
    info_book.style.display = 'none';
});

