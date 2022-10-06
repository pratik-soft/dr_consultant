Hello,

<br/>
<br/>
Your subscribed email-id is {{ $details['email'] }} , Please click on the below link to verify your email account
<br/>
<a href="{{url('subscription/verify', $details['verified_code'])}}">Verify Email</a>

<br/>
<br/>

Thanks