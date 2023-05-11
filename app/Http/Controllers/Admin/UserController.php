<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\SearchRequest;
use App\Models\User;
use App\Services\User\Contracts\UserServiceInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use function redirect;
use function view;

class UserController extends Controller
{
    /**
     * @var UserServiceInterface
     */
    private UserServiceInterface $userService;

    /**
     * @param UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param SearchRequest $request
     * @return View
     */
    public function index(SearchRequest $request): View
    {
        return view('admin.users.index', [
            'users' => $this->userService->getAllPaginated($request->validated()),
        ]);
    }

    /**
     * @param User $user
     * @return View
     */
    public function show(User $user): View
    {
        return view('admin.users.show', ['user' => $user]);
    }

    /**
     * @param User $user
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function changeUserStatus(User $user): RedirectResponse
    {
        $this->authorize('manage', $user);
        $this->userService->update($user, ['is_active' => !$user->is_active]);

        return redirect()->back()
            ->with(($user->is_active ? 'success' : 'error'), 'User ' . ($user['name']) . ' was ' . ($user->is_active ? 'Unblocked' : 'Blocked'));
    }

    /**
     * @param User $user
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(User $user): RedirectResponse
    {
        $this->authorize('manage', $user);
        $this->userService->destroy($user);

        return redirect()->route('admin.users.index')
            ->with('success', 'User ' . ($user['name']) . ' was deleted');

    }
}
