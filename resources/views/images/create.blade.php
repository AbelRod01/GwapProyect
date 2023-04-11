<x-layouts.app title="imagesCreate" meta-description="images create page">
    <br/>
    <div class="container">
        <label for="exampleInputEmail1">Cargar imagen</label>
        <form action="{{route('images.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('images.form')
            <div class="d-flex justify-content-between">
                <a class="nav-link" href="{{route('images.index')}}">regresar</a>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>

</x-layouts.app>
