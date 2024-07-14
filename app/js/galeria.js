var app = new Vue({
    el: '#app',
    data: {
        titulo: 'Feicito 169',
        fotos: [],
        likes:0,
        mensaje:'',
        login:[],
        usuario:'usr',
        password:'passw'
    }, //fin data

    created: function () {
        console.log('Created...');
        this.getFotos();
    }, //fin created
    methods: {
        getFotos: function () {
            const URL = 'http://localhost/galeria169/app/getFotos';
            fetch(URL)
                .then(response => response.json())
                .then(data => {
                    this.fotos= data;
                    console.log("Fotos[]: ",this.fotos);
                });
        },
        cambiaLikes: function (id,likes) {
            likes=Number(likes);
            likes+=1;
            this.likes=likes;
            const URL = 'http://localhost/galeria169/app/incrementaLikes/'+id+'/'+likes;
            console.log(URL);
            fetch(URL)
                .then(response => response.json())
                .then(data => {
                    this.mensaje= data;
                    console.log("Mensaje : ",this.mensaje);
                });
            location.href ='http://localhost/galeria169/app/galeria';
        },
    } //fin metodos
}) //fin vue