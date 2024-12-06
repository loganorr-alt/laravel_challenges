<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    
    {
        $user = User::find($id);
        
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        

        if ($user->delete()) {
            return response()->json(['message' => 'User deleted successfully']);
        }

        return response()->json(['message' => 'Failed to delete user'], 500);
    }
}
