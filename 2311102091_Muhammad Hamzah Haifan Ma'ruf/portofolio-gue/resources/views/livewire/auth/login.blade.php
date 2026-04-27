<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }
};

?>

<div style="
    width:100%;
    max-width:500px;
    border:1px solid rgba(255,255,255,0.08);
    background:rgba(255,255,255,0.04);
    backdrop-filter:blur(18px);
    -webkit-backdrop-filter:blur(18px);
    border-radius:32px;
    padding:38px 34px 30px;
    box-shadow:0 24px 70px rgba(0,0,0,0.42), inset 0 1px 0 rgba(255,255,255,0.03);
    position:relative;
    overflow:hidden;
">
    <div style="
        position:absolute;
        inset:0;
        background:linear-gradient(135deg, rgba(255,255,255,0.05), transparent 28%, transparent 72%, rgba(255,255,255,0.03));
        pointer-events:none;
    "></div>

    <div style="position:relative; z-index:2;">
        <div style="
        ">
            <span 
            ></span>
        </div>

        <h2 style="
            margin:0;
            font-size:2rem;
            line-height:1;
            font-weight:700;
            color:#ffffff;
            letter-spacing:-.04em;
        ">
        </h2>

        <p style="
            margin-top:14px;
            color:#9ca3af;
            font-size:14px;
            line-height:1.9;
            max-width:390px;
        ">
        </p>

        @if (session('status'))
            <div style="
                border-radius:16px;
                padding:14px 16px;
                font-size:13px;
                line-height:1.7;
                margin-top:18px;
                border:1px solid rgba(34,197,94,0.25);
                background:rgba(34,197,94,0.08);
                color:#bbf7d0;
            ">
                {{ session('status') }}
            </div>
        @endif

        <form wire:submit="login" style="margin-top:28px;">
            <div style="margin-bottom:18px;">
                <label for="email" style="
                    display:block;
                    margin-bottom:10px;
                    font-size:12px;
                    font-weight:500;
                    letter-spacing:.18em;
                    text-transform:uppercase;
                    color:#a1a1aa;
                ">
                    Email Address
                </label>

                <input
                    wire:model="email"
                    id="email"
                    type="email"
                    name="email"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="Masukkan email admin"
                    style="
                        width:100%;
                        border:1px solid rgba(255,255,255,0.08);
                        background:rgba(255,255,255,0.035);
                        color:#ffffff;
                        border-radius:18px;
                        padding:16px 18px;
                        outline:none;
                        font-size:14px;
                    "
                >

                @error('email')
                    <div style="
                        border-radius:14px;
                        padding:12px 14px;
                        font-size:13px;
                        line-height:1.7;
                        margin-top:10px;
                        border:1px solid rgba(239,68,68,0.20);
                        background:rgba(239,68,68,0.08);
                        color:#fecaca;
                    ">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div style="margin-bottom:18px;">
                <div style="
                    display:flex;
                    align-items:center;
                    justify-content:space-between;
                    gap:16px;
                    margin-bottom:10px;
                ">
                    <label for="password" style="
                        font-size:12px;
                        font-weight:500;
                        letter-spacing:.18em;
                        text-transform:uppercase;
                        color:#a1a1aa;
                    ">
                        Password
                    </label>

                    @if (Route::has('password.request'))
                        <a
                            href="{{ route('password.request') }}"
                            style="
                                color:#d4d4d8;
                                text-decoration:none;
                                font-size:13px;
                            "
                        >
                            Lupa password?
                        </a>
                    @endif
                </div>

                <input
                    wire:model="password"
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Masukkan password"
                    style="
                        width:100%;
                        border:1px solid rgba(255,255,255,0.08);
                        background:rgba(255,255,255,0.035);
                        color:#ffffff;
                        border-radius:18px;
                        padding:16px 18px;
                        outline:none;
                        font-size:14px;
                    "
                >

                @error('password')
                    <div style="
                        border-radius:14px;
                        padding:12px 14px;
                        font-size:13px;
                        line-height:1.7;
                        margin-top:10px;
                        border:1px solid rgba(239,68,68,0.20);
                        background:rgba(239,68,68,0.08);
                        color:#fecaca;
                    ">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div style="
                display:flex;
                align-items:center;
                justify-content:space-between;
                gap:18px;
                margin-top:10px;
                margin-bottom:24px;
            ">
                <label for="remember" style="
                    display:inline-flex;
                    align-items:center;
                    gap:10px;
                    color:#c4c4cc;
                    font-size:13px;
                ">
                    <input
                        wire:model="remember"
                        id="remember"
                        type="checkbox"
                        style="
                            accent-color:#ffffff;
                            width:16px;
                            height:16px;
                        "
                    >
                    <span>Remember me</span>
                </label>
            </div>

            <button
                type="submit"
                style="
                    width:100%;
                    border:none;
                    border-radius:18px;
                    padding:16px 18px;
                    font-size:14px;
                    font-weight:600;
                    letter-spacing:.08em;
                    text-transform:uppercase;
                    cursor:pointer;
                    color:#050505;
                    background:linear-gradient(90deg, #ffffff 0%, #d4d4d8 50%, #ffffff 100%);
                    box-shadow:0 12px 28px rgba(255,255,255,0.08);
                "
            >
                Sign In
            </button>

            @if (Route::has('register'))
                <div style="
                    margin-top:18px;
                    text-align:center;
                    color:#6b7280;
                    font-size:13px;
                    line-height:1.8;
                ">
                    Belum punya akun?
                    <a
                        href="{{ route('register') }}"
                        style="
                            color:#e4e4e7;
                            text-decoration:none;
                            margin-left:4px;
                        "
                    >
                        Sign up
                    </a>
                </div>
            @endif

            <div style="
                margin-top:18px;
                color:#6b7280;
                font-size:12px;
                line-height:1.8;
                text-align:center;
            ">
            </div>
        </form>
    </div>
</div>