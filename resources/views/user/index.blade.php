@extends('layout.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('users.create')}}"> Tambah Data</a>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th width="280px">Action</th>
        </tr>
        <tbody>
            @php
                $number = 1;
            @endphp
            <!--di foreach dari $users['data'] karna biasanya response dari API itu di bungkus dalam index 'data'-->
            @forelse($users['data'] as $user)
            <tr>
                <td>{{ $number++ }}</td>
                <td>{{ $user['firstName'] }}</td>
                <td>{{ $user['lastName'] }}</td>
                <td align="center">
                    {{-- //modify button delete yg ada dalam table html sebelumnya menjadi: --}}
                    <form method="POST" action="{{ 'users/'.$user['id'] }}">
                        @method('DELETE')
                        @csrf
                    
                        <a href="{{ 'users/'.$user['id'] }}" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> |
                        <button type="submit" class="text-danger btn btn-link" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</button>
                    </form>
                </td>
        
            </tr>
            @empty
                <tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
            @endforelse
        </tbody>
    </table>
        
@endsection