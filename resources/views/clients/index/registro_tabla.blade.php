<tr>
    <td>{{ $client->id }}</td>
    <td>{{ $client->name }}</td>
    <td>{{ $client->cod }}</td>
    <td><a href="@if(isset($client->city->name) ) {{ route('cities.show' , ['city' => $client->city])  }} @else {{ '#' }} @endif">{{ $client->city->name ?? 'SIN CIUDAD' }}</a></td>
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