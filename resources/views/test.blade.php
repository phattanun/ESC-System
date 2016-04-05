<form action="{{ url('/test/login') }}" method="POST">
    {{ csrf_field() }}
    <input name="studentid" placeholder="Student ID 10 Digits" autocomplete="off"></input>
    <input name="password" placeholder="Password" autocomplete="off"></input>
    <button>Login</button>
</form>
