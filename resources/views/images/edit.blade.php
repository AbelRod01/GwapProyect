<x-layouts.app title="imagesEdit" meta-description="images edit page">
    <br/>
    <br/>

    <div class="container">
         <h2 class="h2 mx-auto  text-center">Edit</h2>

        <label for="exampleInputEmail1">Actualizar imagen: {{$postEdit->name;}}</label>
        <form action="{{route('images.update',$postEdit)}}"  method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @include('images.form')
            <div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>

    </div>

</x-layouts.app>
