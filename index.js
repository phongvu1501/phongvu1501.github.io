@extends('main')

@section('title')
    đây là show
@endsection

@section('content')
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Column 1</th>
                    <th scope="col">Column 2</th>

            </thead>
            <tbody>

                @foreach ($customer as $key => $value)
                    <tr>
                        <td>
                            {{ strtoupper($key) }}
                        </td>
                        <td>
                            @switch($key)
                                @case('avatar')
                                    <img src="{{ file_url($value) }}" alt="" width="100px">
                                @break

                                @default
                                    {{ $value }}
                            @endswitch
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
