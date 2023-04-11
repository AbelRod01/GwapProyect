<x-layouts.app title="images" meta-description="images page">

    <div class="container">
        <br/>
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <h1 style="color:rgb(91, 91, 255);">{{$post->name}}</h1>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-10 mx-auto text-center">

                <img src="{{ asset('storage/'.$post->imagen_id) }}"class="img-fluid" alt="Imagen" style="border-radius:10px; width: 60%; height: auto;">
                <form action="{{route('words.store',$post)}}" method="POST">
                    @csrf
                    <h3 class="h3">agregar palabra:</h3>
                    <input type="text" name="name">
                    <button type="submit" class="btn btn-primary m-1">Agregar</button>
                    @error('name')
                    <small class="">{{ $message }}</small>
                    @enderror
                </form>
                @if (count($post->words) > 0)
                    <h2 class="h2">Editar palabras:</h2>
                @endif
                @foreach ($post->words as $word)
                <div class="container d-flex justify-content-between">
                <div class="container d-flex justify-content-start d-flex align-items-center ">

                    <small style="display:inline-block; font-size:25px;">editar:&nbsp;</small>
                    <div style="font-size:30px;">{{$word->name;}}&nbsp;</div>
                </div>
                <div class="container d-flex justify-content-start d-flex align-items-center ">
                    <form action="{{route('words.update',$word)}}" method="POST" style="" class="d-flex align-items-center m-1">
                        @csrf
                        @method('PATCH')

                        <input type="text" name="name" >
                        <button type="submit" class="btn btn-info m-1">Actualizar</button>
                        @error('name')
                        <small class="">{{ $message }}</small>
                        @enderror
                    </form>
                    <form action="{{route('words.destroy',$word)}}" method="POST" style="display:inline-block;" class="d-flex align-items-center m-1 ">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ">Borrar</button>
                        </form>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <br/>
    </div>

</x-layouts.app>
