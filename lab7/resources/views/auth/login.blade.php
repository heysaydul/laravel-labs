<x-layout title="Log in">
    <div class="hero bg-base-200 min-h-[80vh]">
        <div class="card bg-base-100 w-full max-w-sm shadow-2xl">
            <div class="card-body">
                <h1 class="text-3xl font-bold text-center">Log in</h1>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <fieldset class="fieldset">
                        <label class="label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="input w-full" placeholder="Email">
                        @error('email') <p class="text-error text-sm">{{ $message }}</p> @enderror

                        <label class="label">Password</label>
                        <input type="password" name="password" class="input w-full" placeholder="Password">
                        @error('password') <p class="text-error text-sm">{{ $message }}</p> @enderror

                        <button type="submit" class="btn btn-neutral mt-4">Log in</button>
                    </fieldset>
                </form>

                <p class="text-sm text-center mt-2">
                    No account? <a href="{{ route('register') }}" class="link">Register</a>
                </p>
            </div>
        </div>
    </div>
</x-layout>