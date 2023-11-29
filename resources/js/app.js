import './bootstrap';

document.addEventListener("DOMContentLoaded", function() {

    if(document.querySelector('.form')) {
        let form = document.querySelector('.form');
        let inputUrl = document.querySelector('#url_external');
        let shortUrl = document.querySelector('#url_internal');
        let nameUrl = document.querySelector('#url_name');
        form.addEventListener('submit', (e) => {
            if (inputUrl.classList.contains('is-invalid')
                || shortUrl.classList.contains('is-invalid')
                || nameUrl.value === ''
                || inputUrl.value === ''
            ) {
                e.preventDefault();
            }
        })
        inputUrl.addEventListener('change', () => {
            let url = inputUrl.value;
            let regex = new RegExp(/^(ftp|http|https):\/\/[^ "]+$/);
            if(regex.test(url)) {
                inputUrl.classList.remove('is-invalid');
                inputUrl.classList.add('is-valid');
            } else {
                inputUrl.classList.remove('is-valid');
                inputUrl.classList.add('is-invalid');
            }
            // validateInputs(inputUrl,'/^(ftp|http|https):\\/\\/[^ "]+$/');
        })
        shortUrl.addEventListener('change', () => {
            let string = shortUrl.value;
            let regex = new RegExp(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/);
            if(!regex.test(string)) {
                shortUrl.classList.remove('is-invalid');
                shortUrl.classList.add('is-valid');
            } else {
                shortUrl.classList.remove('is-valid');
                shortUrl.classList.add('is-invalid');
                createBtn.classList.add('disabled');
            }
        })
    }
});

