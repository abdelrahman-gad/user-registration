<?php

namespace App\Http\Controllers\Api\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Site\Auth\ChangePasswordRequest;
use App\Repositories\Eloquents\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use App\Events\PasswordChanged;
use Illuminate\Support\Facades\Log;


class UserProfileController extends Controller {

    protected UserRepository $userRepository;

    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function show(Request $request): JsonResponse {

        $user = $request->user();

        return response()->json( [
            'message' => 'User Profile',
            'data' => $user
        ], Response::HTTP_OK );
  
    }

    public function changePassword(ChangePasswordRequest $request): JsonResponse {

        $email = $request->user()->email;
       
        if ( !auth( 'user-api' )->attempt( [ 'email' => $email , 'password'=> $request->old_password] ) ) {
            return response()->json( [ 'message'=>'Incorrect Old Passowrd.' ], JsonResponse::HTTP_UNAUTHORIZED );
        }

        $user = $request->user();
        $user->password = Hash::make( $request->new_password );
        $user->save();

        $user->tokens()->delete();

        try {
            event( new PasswordChanged( $user) ); 
        } catch (\Throwable $th) {
            Log::error("message: {$th->getMessage()} file: {$th->getFile()} line: {$th->getLine()}");
        }

        return response()->json( [
            'message' => 'Password Changed Successfully',
            'data' => []
        ], Response::HTTP_OK );
    }

}
