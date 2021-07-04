@extends('home')

@section('title', 'Childreen Education - Castigos')

@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Criança</th>
                <th>Disciplina</th>
                <th>Qtde</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($report as $item)
            <tr>
                <td>{{$item->child}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->punish}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
