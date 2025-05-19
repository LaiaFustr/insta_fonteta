 @auth
 <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
     <div class="row">
        <form method="post" action="{{ route('create.message') }}"> <!-- //falta crear la ruta -->
            @csrf
         <div class="input-group" style="display:flex; justify-content:center;">
             <input class="form-control" type="text" placeholder="Añade un mensaje..." style="width:50vw!important;">
             <button type="submit" class="d-flex px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] ms-0" style="width:auto!important;">Añadir</button>
         </div>
         </form>
     </div>
 </div>
 @endauth

 @if(isset($mensajes))
 <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
     <div class="row">
         <?php /* dd($mensajes) */ ?>
         @if($mensajes!= null)
         <div class="col-12">
             @foreach($mensajes as $mensaje)
             <div class="p-4">
                 <div class="alert alert-primary">
                     <span class="text-primary small bolder me-auto">{{ $mensaje->user->name }}</span>
                     {{ $mensaje->content }}
                 </div>
                 @if($mensaje->comentarios)

                 @foreach($mensaje->comentarios as $comentario)
                 <div class="alert alert-light ms-5">
                     <span class="text-primary small bolder me-auto">{{ $comentario->user->name }}</span>
                     {{$comentario->content}}
                 </div>
                 @endforeach
                 @else
                 <div>No hay comentarios</div>

                 @endif
             </div>
             @endforeach
         </div>
         @else

         <div>No hay nada</div>
     </div>
     @endif
 </div>
 @else
 <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">No existen mensajes</div>
 @endif