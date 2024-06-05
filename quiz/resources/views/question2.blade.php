<x-layout :pageTitle="'Question 2'">
    <div class="w-full h-full flex flex-col justify-center items-center gap-8">

        @auth
            <h1 class="text-4xl">Welcome, {{auth()->user()->name}}</h1>
            <a href="/logout" class="px-4 py-2 bg-red-400 text-white">Logout</a>
            
        @else
            <form action="{{route('login')}}" method="POST" class="flex flex-col gap-8 bg-slate-100 p-4 rounded-md shadow-md">
                @csrf
            <h1 class="text-2xl text-center">Login</h1>
                <input name="email" class="w-[400px] h-[50px] bg-slate-200 rounded-md px-2 border border-gray-600" type="text" placeholder="Email">
                <input name="password" class="w-[400px] h-[50px] bg-slate-200 rounded-md px-2 border border-gray-600" type="password" placeholder="Password">
                <input class="h-[50px] bg-blue-500 px-4 py-2 rounded-md text-white" type="submit" value="Login">
            </form>

            <form action="{{route('register')}}" method="POST" class="flex flex-col gap-8 bg-slate-100 p-4 rounded-md shadow-md">
                @csrf
                <h1 class="text-2xl text-center">Sign Up</h1>
                <input name="name" class="w-[400px] h-[50px] bg-slate-200 rounded-md px-2 border border-gray-600" type="text" placeholder="Username">
                <input name="email" class="w-[400px] h-[50px] bg-slate-200 rounded-md px-2 border border-gray-600" type="text" placeholder="Email">
                <input name="password" class="w-[400px] h-[50px] bg-slate-200 rounded-md px-2 border border-gray-600" type="password" placeholder="Password">
                <input name="password_confirmation" class="w-[400px] h-[50px] bg-slate-200 rounded-md px-2 border border-gray-600" type="password" placeholder="Confirm Password">
                <input class="h-[50px] bg-blue-500 px-4 py-2 rounded-md text-white" type="submit" value="Sign Up">
            </form>    
        @endauth
        
    </div>
</x-layout>