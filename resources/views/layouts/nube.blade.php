@if(isset($etiquetas))
<div class="row d-flex w-75 d-flex h-100 p-5">
   <!-- <div class="col-12"> -->
      <!--    <div class="row"> -->
      @foreach($etiquetas as $etiqueta)
      <a class="col-auto p-0 m-0" href="{{route('etiqueta.show',$etiqueta->id)}}">
         <h1 class="h1" style="color: <?php
                                       echo sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                                       ?>;">{{$etiqueta->nombre}}</h1>
      </a>

      @endforeach
   </div>
<!-- </div> --><!-- </div> -->
@else
<div class="d-flex justify-content-center align-items-center w-full  lg:grow ">No existen etiquetas</div>
@endif