const opcionCambiada = () => {
    if($etiquetas.value === 'all'){
        verBlogs();
    }
    else{
        verBlogsEtiqueta($etiquetas.value);
    }
  };

const $etiquetas = document.getElementById('etiquetasLista')
$etiquetas.addEventListener("change", opcionCambiada);


function verBlogs(){
    document.getElementById('circulo').classList.remove('hide');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#blogs").empty();
    $.ajax({
        url: "http://localhost/prophysio/public/api/blogsApi",
        type: "POST",
        success: function(result){
            var resultado = JSON.parse(result);
            document.getElementById('circulo').classList.add('hide');
            resultado.forEach(blog => {
                if(blog.estado === 1){
                    $registro = `            <div class="col s12 m6 l4 contBlog">
                    <div class="card">
                        <div class="card-image">
                            <img alt="${blog.alt}" style="width: 100%;" class="responsive-img" src="../${blog.imagen} ">
                        </div>
                        <div class="card-content">
                            <span class="card-title"> ${blog.nombre}</span>
                            ${blog.contenido}
                        </div>
                        <div id="blog${blog.id}" class="card-action"> </div>
                    </div> </div>`
                    $("#blogs").append($registro);
                    $.ajax({
                        url: "http://localhost/prophysio/public/api/etiquetaApi",
                        type: "POST",
                        data: 'id='+ blog.id,
                        success: function(resultadoT){
                            resultadoT.forEach(etiqueta => {
                                $tags = `<button onclick="verBlogsEtiqueta(${etiqueta.id})" class="enlace"> ${etiqueta.nombre}</button>`
                                document.getElementById('blog'+blog.id).innerHTML += $tags;
                            })
                        }
                    })
                }

            });            
        }
    }); 
}

function verBlogsEtiqueta(idEtiqueta) {
    document.getElementById('circulo').classList.remove('hide');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#blogs").empty();
    $.ajax({
        url: "http://localhost/prophysio/public/api/blogEtiquetaApi",
        type: "POST",
        data: 'id='+ idEtiqueta,
        success: function(result){
            var resultado = JSON.parse(result);
            document.getElementById('circulo').classList.add('hide');
            resultado.forEach(blog => {
                if(blog.estado === 1){
                    $registro = `            <div class="col s12 m6 l4 contBlog">
                    <div class="card">
                        <div class="card-image">
                            <img alt="${blog.alt}" style="width: 100%;" class="responsive-img" src="../${blog.imagen} ">
                        </div>
                        <div class="card-content">
                            <span class="card-title"> ${blog.nombre}</span>
                            ${blog.contenido}
                        </div>
                        <div id="blog${blog.id}" class="card-action"> </div>
                    </div> </div>`
                    $("#blogs").append($registro);
                    $.ajax({
                        url: "http://localhost/prophysio/public/api/etiquetaApi",
                        type: "POST",
                        data: 'id='+ blog.id,
                        success: function(resultadoT){
                            resultadoT.forEach(etiqueta => {
                                $tags = `<button onclick="verBlogsEtiqueta(${etiqueta.id})"  class="enlace"> ${etiqueta.nombre}</button>`
                                document.getElementById('blog'+blog.id).innerHTML += $tags;
                            })
                        }
                    })
                }

            });            
        }
    }); 
}

function obtenerEtiquetas(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "http://localhost/prophysio/public/api/mostrarEtiquetaApi",
        type: "POST",
        success: function(resultado){
            const $etiquetas = document.getElementById('etiquetasLista')
            resultado = JSON.parse(resultado);
            resultado.forEach(etiqueta => {
                console.log(etiqueta.nombre);
                const option = document.createElement('option');
                option.value = etiqueta.id;
                option.text = etiqueta.nombre;
                //$tag = `<option value="${etiqueta.id}">${etiqueta.nombre}</option>`;
                $etiquetas.appendChild(option);
            })
        }
    })
}