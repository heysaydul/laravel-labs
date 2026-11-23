<x-layout title="Register">
    <div class="hero bg-base-200 min-h-[80vh]">
        <div class="card bg-base-100 w-full max-w-sm shadow-2xl">
            <div class="card-body">
                <h1 class="text-3xl font-bold text-center">Register</h1>

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <fieldset class="fieldset">
                        <label class="label">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="input w-full" placeholder="Name">
                        @error('name') <p class="text-error text-sm">{{ $message }}</p> @enderror

                        <label class="label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="input w-full" placeholder="Email">
                        @error('email') <p class="text-error text-sm">{{ $message }}</p> @enderror

                        <label class="label">Password</label>
                        <input type="password" name="password" class="input w-full" placeholder="Password">
                        @error('password') <p class="text-error text-sm">{{ $message }}</p> @enderror

                        <label class="label">Confirm password</label>
                        <input type="password" name="password_confirmation" class="input w-full" placeholder="Repeat password">

                        <button type="submit" class="btn btn-neutral mt-4">Register</button>
                    </fieldset>
                </form>

                <p class="text-sm text-center mt-2">
                    Already registered? <a href="{{ route('login') }}" class="link">Log in</a>
                </p>
            </div>
        </div>
    </div>
</x-layout>