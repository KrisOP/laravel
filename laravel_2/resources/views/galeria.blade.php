@extends("layouts.plantilla") 

@section ("cabecera")

<h1>Galeria</h1>

@endsection

@section ("infoGeneral")

<p> Aqui iria el contenido principal de la pagina
y tambien es la galeria de fotos</p>

    @if(count ($alumnos))
        
        <table width="50%" border="1">
            @foreach($alumnos as $personas)
                <tr>
                    <td>
                        {{$personas}}
                    </td>
                </tr>
            @endforeach
        </table>

     @else
     
     {{"Sin Parametros"}}   

    @endif

@endsection

@section ("pie")
 
@endsection