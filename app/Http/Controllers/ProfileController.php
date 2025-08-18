namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit() {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request) {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'institution' => 'nullable|string',
        ]);

        $user->update($request->only('name', 'email', 'institution'));

        return redirect()->route('dashboard')->with('success', 'Profile updated!');
    }
}
