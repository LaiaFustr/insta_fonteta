 @auth
 <div class="flex items-center justify-center w-full">
     <div class="row">
         <form method="post" action="{{ route('mensaje.create') }}"> <!-- //falta crear la ruta -->
             @csrf
             <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
             <div class="input-group" style="display:flex; justify-content:center;">
                 <input class="form-control" type="text" name="content" placeholder="Añade un mensaje..." style="width:50vw!important;">
                 <button type="submit" class="btn btn-outline-primary d-flex px-5 py-1.5  ms-0" style="width:auto!important;">Añadir Mensaje</button>
             </div>

         </form>
     </div>
 </div>
 @endauth

 @if(isset($mensajes))

 <div class="row py-5" style="position: absolute; left:20px; width: 310px;">
     <div class="col-7">
         <div class="row">
             
             @if($mensajes->listaetiquetas !=null)
             @foreach($mensajes->listaetiquetas as $etiqueta)
             <a class="col-auto p-0 m-0" href="{{route('etiqueta.show',$etiqueta->id)}}">
                 <h5 class="h5" style="color: <?php
                                                echo sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                                                ?>;">{{$etiqueta->nombre}}</h5>
             </a>
             @endforeach



             @else
             <div class="d-flex justify-content-center align-items-center w-full  lg:grow ">No existen etiquetas</div>
             @endif

          
         </div>
     </div>
 </div>

 <div class="flex justify-center transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
     <div class="row">
         <?php /* dd($mensajes) */ ?>
         @if($mensajes!= null)
         <div class="col-12">
             @foreach($mensajes as $mensaje)
             <div class="p-4">


                 <div class="alert alert-info">
                     <span class="text-primary me-auto">{{ $mensaje->user->name }}</span>
                     <div class="row">
                         @if(session('editmsg') !=null && session('editmsg') == $mensaje->id)
                         <form method="post" action="{{route('admin.msg.store')}}">
                             @csrf
                             <input type="hidden" name="id" value="{{$mensaje->id}}">
                             <textarea class="form-control" name="content" id="">{{session('content')}}</textarea>
                             <button class="mt-2 px-3 py-2 border rounded" style="border:1px solid #055160!important;" type="submit"><strong>Aceptar cambios</strong></button>
                         </form>
                         @else
                         <p class="col pb-0 h5"> {!! $mensaje->content !!} </p>
                         @endif

                         @auth
                         @if(Auth::user()->role == 'admin')<!-- tendrá acceso a las rutas de editado y borrado de admin  -->
                         <div class="col-auto ms-auto">
                             <div class="row d-flex">
                                 <div class="col-auto px-1">
                                     <form method="get" action="{{route('admin.msg.edit', $mensaje->id)}}">
                                         @csrf
                                         <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-pencil"></i></button>
                                     </form>
                                 </div>
                                 <div class="col-auto  px-1">
                                     <form method="post" action="{{route('admin.msg.destroy', $mensaje->id)}}">
                                         @csrf
                                         @method('DELETE')
                                         <button class="btn btn-sm btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                                     </form>
                                 </div>
                             </div>
                         </div>
                         @elseif( $mensaje->user->name == Auth::user()->name)<!-- tendrá acceso a las rutas de editado y borrado de user  -->
                         <div class="col-auto ms-auto  gap-3">
                             <form method="post" action="{{route('msg.destroy', $mensaje->id)}}">
                                 @csrf
                                  @method('DELETE')
                                 <button class="btn btn-sm btn-outline-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                             </form>
                         </div>
                         @endif
                         @endauth
                     </div>
                 </div>

                 @if($mensaje->comentarios)

                 @foreach($mensaje->comentarios as $comentario)

                 <div class=" my-2 ms-5 p-2 px-5 border-bottom">
                     <span class="text-warning small bolder me-auto">{{ $comentario->user->name }}</span>
                     <div class="row">
                         @if(session('editcomment') !=null && session('editcomment') == $comentario->id)
                         <form method="post" action="{{route('admin.comment.store')}}">
                             @csrf
                             <input type="hidden" name="id" value="{{$comentario->id}}">
                             <textarea class="form-control" name="content" id="">{{$comentario->content}}</textarea>
                             <button class="mt-2 px-3 py-2 border border-secondary rounded"  type="submit">Aceptar cambios</button>
                         </form>
                         @else
                         <div class="col"> {{$comentario->content}}</div>
                         @endif
                         @auth
                         @if(Auth::user()->role == 'admin' )
                         <div class="col-auto ms-auto">
                             <div class="row d-flex">
                                 <div class="col-auto px-1">
                                     <form method="get" action="{{route('admin.comment.edit', $comentario->id)}}">
                                         @csrf
                                         <button class="btn-sm small text-secondary mx-1" type="submit"><i class="fa-solid fa-pencil"></i></button>
                                     </form>
                                 </div>

                                 <div class="col-auto px-1">
                                     <form method="post" action="{{route('admin.comment.destroy', $comentario->id)}}">
                                         @csrf
                                         @method('DELETE')
                                         <button class="btn-sm small text-secondary mx-1" type="submit"><i class="fa-solid fa-trash"></i></button>
                                     </form>
                                 </div>
                             </div>
                         </div>
                         @elseif($comentario->user->name == Auth::user()->name)
                         <div class="col-auto ms-auto">
                             <!--  <form action="">
                                 <button class="btn-sm small text-secondary mx-1" type="submit"><i class="fa-solid fa-pencil"></i></button>
                             </form> -->
                             <form method="post" action="{{route('comment.destroy', $comentario->id)}}">
                                 @csrf
                                  @method('DELETE')
                                 <button class="btn-sm small text-secondary mx-1" type="submit"><i class="fa-solid fa-trash"></i></button>
                             </form>
                         </div>
                         @endif
                         @endauth

                     </div>
                 </div>

                 @endforeach
                 @else
                 <div>No hay comentarios</div>

                 @endif
                 @auth
                 <!-- <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0"> -->
                 <div class="col  ms-5">
                     <form method="post" action="{{route('comment.create')}}"> <!-- //falta crear la ruta -->
                         @csrf
                         <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                         <input type="hidden" name="mensaje_id" value="{{ $mensaje->id}}">
                         <div class="input-group" style="display:flex; justify-content:center;">
                             <input class="form-control" type="text" name="content" placeholder="Añade un comentario..." style="width:50vw!important;">
                             <button type="submit" class="d-flex px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] ms-0" style="width:auto!important;">Añadir Comentario</button>
                         </div>

                     </form>
                 </div>
                 <!-- </div> -->
                 @endauth
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