<tr>
    <td>{{ $city->id }}</td>
    <td>{{ $city->name }}</td>
    <td>{{ $city->cod }}</td>
    <td>
        <form action="{{ route('cities.destroy',$city->id) }}" method="POST">
            <a class="btn btn-success" href="{{ route('cities.show',$city->id) }}">Mostrar</a>
            <a class="btn btn-primary" href="{{ route('cities.edit',$city->id) }}">Editar</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Borrar</button>
        </form>
    </td>
</tr>