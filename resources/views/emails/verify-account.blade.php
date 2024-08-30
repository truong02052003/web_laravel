<h2>Hi:{{$account->name}}</h2>

<p>
    <a href="{{route('account.veryfy',$account->email)}}">Click here to verify your account</a>
</p>