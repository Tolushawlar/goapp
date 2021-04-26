
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}


public function forget(ForgotRequest $request)
    {
        // $email = $request->input(key:'email');
        $email = (['email' => $request->email]);

        if(User::where('email', $email)->doestExists()){
            return response([
                'message' => "User does not exists"
            ], status: 404);
        }


    }




    public function forgotPassword(Request $request)
    {
        $user = User::whereEmail($request->email)->first();

        if(count($user) == 0){
            return redirect()->back()->with(["error" => "Email not exists"]);
        }

        $user = Sentinel::findById($user -> id);
        $reminder = Reminder::exists($user) ? : Reminder::create($user);
        $this->sendEmail($user, $reminder-> code);

        return redirect()->back()->with((['success' => "Reset code sent to your mail."]));
    }

    public function sendEmail($user, $code){
        Mail::send(
            'email.for'
        )
    }
\



Mail::send('Mails.forgot', ['token' => $token], function(Message $message) use($email){
                $message -> to($email);
                $message->subject("Reset Your Password");
            });
