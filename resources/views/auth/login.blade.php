@extends('layouts.app')

@section('title', 'Sign in')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center">
    <form method="POST" action="/login" class="w-full max-w-sm space-y-4 p-6 bg-white rounded-lg shadow-md border border-gray-100">
        @csrf

        <h2 class="text-xl font-semibold text-gray-800 text-center mb-4">Sign In</h2>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
            <input 
                type="email" 
                name="email" 
                value="{{ old('email') }}" 
                placeholder="nurse.lastname@bakuna.test" 
                class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-emerald-500 focus:outline-none"
                required
            >
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input 
                type="password" 
                name="password" 
                placeholder="••••••••" 
                class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-emerald-500 focus:outline-none"
                required
            >
            @error('password')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-md p-2 transition">
            Sign in
        </button>
    </form>
</div>
@endsection