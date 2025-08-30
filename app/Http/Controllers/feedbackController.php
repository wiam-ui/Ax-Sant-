<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\feedback;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

class feedbackController extends Controller
{
    public function add(request $request) {

        $validated = $request->validate([
            'message' => 'required|string',
        ]);

        $validated['user_id'] = Auth::id();
        feedback::create($validated);
        flash()->success('feedback est ajouté avec succès');
        return redirect()->back();
    }

    

}
