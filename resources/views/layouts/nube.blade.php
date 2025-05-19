@if(isset($etiquetas))
<div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">

   @foreach($etiquetas as $etiqueta)
   <a href="{{route('etiqueta.show',$etiqueta->id)}}">{{$etiqueta->nombre}}</a>
   @endforeach
</div>

@else

@endif