<x-layouts.app title="images" meta-description="images page">



    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <h1 >Imagenes del juego</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto text-center">
                @if (Auth::check() && Auth::user()->role === 'admin')
                    <a href="{{route('images.create')}}" class="btn btn-primary">cargar imagen</a>
                @else

                @endif
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="d-flex flex-wrap">
                @foreach ($posteo as $post)
                    <div class="col-md-4 mb-4">
                            <img src="{{ asset('storage/'.$post->imagen_id) }}" alt="Imagen" style="border-radius:10px; width: 100%; height: 90%; object-fit:cover">
                        <div  class="d-flex justify-content-around my-2">
                            @if (Auth::check() && Auth::user()->role === 'admin')
                                <a  href="{{route('images.edit',$post)}}"class="h4 d-flex align-items-center">editar&nbsp;</a>
                                <a  href="{{route('images.show',$post)}}"class="h6 d-flex align-items-center">agregar palabras&nbsp;</a>
                                <form action="{{route('images.destroy',$post)}}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"class="btn btn-primary">
                                        Borrar
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

</x-layouts.app>
