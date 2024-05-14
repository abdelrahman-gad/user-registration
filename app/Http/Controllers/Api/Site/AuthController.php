<?php

namespace App\Http\Controllers\Api\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Site\Auth\LoginRequest;
use App\Http\Requests\Api\Site\Auth\RegisterRequest;
use App\Repositories\Eloquents\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller {

    protected UserRepository $userRepository;

    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function register( RegisterRequest $request ): JsonResponse{

        $request['password'] = Hash::make( $request->password );

        $user =  $this->userRepository->create( $request->all() );

        try {
            event( new UserRegistered( $user ) );
        } catch (\Throwable $th) {
           Log::error("message: {$th->getMessage()} file: {$th->getFile()} line: {$th->getLine()}");
        }

        return response()->json( [
            'message' => 'Registered Successfully',
            'data' => []
        ], Response::HTTP_OK );

    }

    public function login( LoginRequest $request ): JsonResponse {

        $user = $this->userRepository->whereColumns( [ 'email'=>$request->email ] )->first();

        if ( !$user ) return response()->json( [ 'message'=>'User Not Found' ], Response::HTTP_UNAUTHORIZED );

      
        $credentials = $request->only( [ 'email', 'password' ] );

        if ( !auth( 'user-api' )->attempt( $credentials ) ) {
            return response()->json( [ 'message'=>'Invalid Credentials' ], JsonResponse::HTTP_UNAUTHORIZED );
        }

        $user = Auth::guard( 'user-api' )->user();

        $token =  $user->createToken( config( 'sanctum.jwt-secret' ), [ 'user' ] )->plainTextToken;

        return response()->json( [
            'message' => 'Login Successfully',
            'data' => [
                'token' => $token,
                'user' => $user
            ]
        ], Response::HTTP_OK );
    }

    public function logout( Request $request ): JsonResponse {
       
        $request->user()->currentAccessToken()->delete();

        return response()->json( [
            'message' => 'Logout Successfully',
            'data' => []
        ], Response::HTTP_OK );
    }

}
