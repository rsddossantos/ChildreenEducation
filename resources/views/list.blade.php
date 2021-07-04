@extends('home')

@section('title', 'Childreen Education')

@section('content')
    @if(session('warning'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top:15px">
            <strong>{{ session('warning') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <table class="table table-hover">
        <thead></thead>
        <tbody>
            @foreach ($list as $item)
                <tr>
                    <td>
                        <button class="btn btn-primary"
                                onClick="confirm('Deseja incrementar a pontuação para @php echo $item->id_child == 1 ? 'a BIANCA' : 'o DIOGO'; @endphp?','{{url('addPoints')}}/{{$item->id}}/{{$item->id_child}}')">{{$item->points}}
                        </button>
                    </td>
                    <td width="70%">
                        {{$item->title}}
                    </td>
                    <td class="punishment">
                        @if ($item->punishment1 == 1)
                            <a href="#" onclick="confirm('Deseja marcar o castigo como realizado?','/clearPunish/{{$item->id}}/1')"><img width="50px" src="{{url('assets/images/remove.png')}}"/></a>
                        @else
                            <img width="50px" src="{{url('assets/images/check.png')}}"/>
                        @endif
                    </td>
                    <td class="punishment">
                        @if ($item->punishment2 == 1)
                            <a href="#" onclick="return confirm('Deseja marcar o castigo como realizado?','/clearPunish/{{$item->id}}/2')"><img width="50px" src="{{url('assets/images/remove.png')}}"/></a>
                        @else
                            <img width="50px" src="{{url('assets/images/check.png')}}"/>
                        @endif
                    </td>
                    <td class="punishment">
                        @if ($item->punishment3 == 1)
                            <a href="#" onclick="return confirm('Deseja marcar o castigo como realizado?','/clearPunish/{{$item->id}}/3')"><img width="50px" src="{{url('assets/images/remove.png')}}"/></a>
                        @else
                            <img width="50px" src="{{url('assets/images/check.png')}}"/>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
