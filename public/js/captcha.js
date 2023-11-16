document.addEventListener('submit', function(e){
    e.preventDefault();
    grecaptcha.ready(function() {
        grecaptcha.execute('6LcztLgkAAAAAAkhcLxVC0asNYzPNM6A-CGgGK5Q', {action: 'submit'}).then(function(token) {
            let form = e.target;
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'g-recaptcha-response';
            input.value = token;

            form.appendChild(input);

            form.submit();
        });
    });
});