var app = new Vue({
    el: '#app',
    data: {
        login:[],
        usuario:'',
        password:''
    }, //fin data

    created: function () {
        console.log('Created...');
        //this.getFotos();
    }, //fin created
    methods: {
        userLogin : function (usuario,password) {
            const URL = 'http://localhost/galeria169/app/login/'+usuario+'/'+password;
            console.log(URL);
            fetch(URL)
                .then(response => response.json())
                .then(data => {
                    this.login=data;
                    console.log("Login : ",this.login);
                    if ( this.login != null)
                        location.href ='http://localhost/galeria169/app/galeria';
                    else
                        location.href ='http://localhost/galeria169/app/login';

                });
        }
    } //fin metodos
}) //fin vue