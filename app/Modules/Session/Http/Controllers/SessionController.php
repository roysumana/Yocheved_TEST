<?php

namespace App\Modules\Session\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Session\Http\Requests\CreateSessionRequest;
use App\Modules\Session\Http\Requests\UpdateSessionRequest;
use App\Modules\Session\Models\Session;
use App\Modules\Student\Models\Student;

class SessionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Get sessions list controller function.
     *
     */
    public function index()
    {
        return view('student.session.index', [
            'sessions' => Session::with(['Student'])->paginate()
        ]);
    }

    public function create()
    {
        return view('student.session.create', [
            'types' => Session::sessionTypes(),
            'students' => Student::get(),
        ]);
    }

    public function edit($id)
    {
        return view('student.session.edit', [
            'session' => Session::find($id),
        ]);
    }

    /**
     * Store student controller function.
     *
     * @param CreateSessionRequest $request
     */
    public function store(CreateSessionRequest $request)
    {
        $data = $request->validated();
        $session = Session::create($data);

        return redirect('session');
    }

    /**
     * Update student controller function.
     *
     * @param UpdateSessionRequest $request
     */
    public function update(UpdateSessionRequest $request, Session $session)
    {
        $data = $request->validated();
        $session = $session->update($data);
        return redirect('session');
    }
}
