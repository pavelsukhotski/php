<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Test Task</title>
</head>
<body>
    <form action="{{ url('user') }}" method="POST">
        {{csrf_field()}}
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="country" placeholder="Country">
        <input type="text" name="region" placeholder="Region">
        <input type="text" name="city" placeholder="City">
        <button type="submit">Add</button>
    </form>

    @if(count($users) > 0)
        <ul>
           @foreach($users as $user)

               <li>{{ $user->name }} - {{ $user->country }} - {{ $user->region }} region - {{ $user->city }}</li>
               <form action="{{ url('user/'.$user->id) }}" method="POST">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button>Delete</button>
            
                </form>
                
                <form action="{{ url('user/'.$user->id) }}" method="POST">
                    {{csrf_field()}}
                    {{method_field('UPDATE')}}  
                    <button>Update</button>
                </form>
            
                <br>
            @endforeach
        </ul>
    @endif
</body>
</html>
