<tr>
    <td>{{ $client->id }}</td>
    <td>{{ $client->name }}</td>
    <td>{{ $client->cod }}</td>
    <td>
        @if(isset($client->city->name) )
            <a href="{{ route('cities.show' , ['city' => $client->city])  }}">{{ $client->city->name }}</a>
        @else
            SIN CIUDAD
        @endif
    </td>
    <td>
        <form action="{{ route('clients.destroy',$client->id) }}" method="POST">
            <a class="btn btn-success" href="{{ route('clients.show',$client->id) }}">Mostrar</a>
            <a class="btn btn-primary" href="{{ route('clients.edit',$client->id) }}">Editar</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Borrar</button>
        </form>
    </td>
</tr>