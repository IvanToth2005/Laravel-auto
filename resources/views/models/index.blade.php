@extends('layout')

@section('content')
<h1>Modellek</h1>


<form method="GET" action="{{ route('models.index') }}">
    <label for="maker">Gyártó választása:</label>
    <select name="maker_id" id="maker" onchange="this.form.submit()">
        <option value="">Összes gyártó</option>
        @foreach($makers as $maker)
            <option value="{{ $maker->id }}" {{ request('maker_id') == $maker->id ? 'selected' : '' }}>
                {{ $maker->name }}
            </option>
        @endforeach
    </select>
</form>

<div class="fodiv">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Megnevezés</th>
                <th>Gombok</th>
                <th>Logo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($models as $model)
                <tr>
                    <td>{{ $model->id }}</td>
                    <td>{{ $model->name }}</td>
                    <td>
                        @if(auth()->check())
                            <form action="{{ route('models.destroy', $model->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="btn-del-model" title="Töröl">
                                    <i class="fa fa-trash-can trash"></i>
                                </button>
                            </form>

                            <a href="{{ route('models.edit', $model->id) }}">
                                <button title="Módosít">
                                    <i class="fa fa-edit edit"></i>
                                </button>
                            </a>
                        @endif
                    </td>
                    <td>
                        @if(isset($model->logo))
                            <img src="{{ $model->logo }}" alt="{{ $model->name }} logo" style="max-width: 50px;">
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
