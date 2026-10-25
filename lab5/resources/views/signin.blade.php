<x-layout title="Sign in">
    <div class="hero bg-base-200 min-h-[80vh]">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold">Register now!</h1>
                <p class="py-6">
                    Create an account by entering your name, email and password.
                </p>
            </div>

            <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl">
                <div class="card-body">
                    <form action="/signin" method="POST">
                        @csrf

                        <fieldset class="fieldset">
                            <label class="label">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                   class="input" placeholder="Name" />
                            @error('name')
                                <p class="text-error text-sm">{{ $message }}</p>
                            @enderror

                            <label class="label">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   class="input" placeholder="Email" />
                            @error('email')
                                <p class="text-error text-sm">{{ $message }}</p>
                            @enderror

                            <label class="label">Password</label>
                            <input type="password" name="password"
                                   class="input" placeholder="Password" />
                            @error('password')
                                <p class="text-error text-sm">{{ $message }}</p>
                            @enderror

                            <button type="submit" class="btn btn-neutral mt-4">Register</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>