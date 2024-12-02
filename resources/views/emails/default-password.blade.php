<style>
    .email-field {
        border: 1px solid #ccc;
        padding: 8px;
        border-radius: 5px;
        margin-top: 5px;
        font-size: 16px;
    }
</style>

<p style="font-family: 'Times New Roman', Times, serif">The following is your email and password that you can use to log in to the application :</p>
<p style="font-family: 'Times New Roman', Times, serif">Email: <strong>{{ $user->email }}</strong></p>
<p style="font-family: 'Times New Roman', Times, serif">Password: <strong>{{ $defaultPassword }}</strong></p>
