<x-layout>

    <x-slot:heading>
        Creer un billet
    </x-slot:heading>
    
    
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        {{ session('success') }}
    </div>
  @endif
  
  @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
        {{ session('error') }}
    </div>
  @endif
        
        
            <!--
          This example requires some changes to your config:
          
          ```
          // tailwind.config.js
          module.exports = {
            // ...
            plugins: [
              // ...
              require('@tailwindcss/forms'),
            ],
          }
          ```
        -->
        <form method="POST" action="/billets/create">
            
            @csrf
        
            <div class="space-y-12">
              <div class="border-b border-gray-900/10 pb-12">
                {{-- <h2 class="text-base font-semibold leading-7 text-gray-900">Faire un</h2> --}}
                <p class="mt-1 text-sm leading-6 text-gray-600">Entrer les informations </p>
          
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  
    {{----------------- date --------------}}
  
                    <div class="sm:col-span-4">
                        <label for="date" class="block text-sm font-medium leading-6 text-gray-900">Date</label>
                        <div class="mt-2">
                          <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            
                            <input type="date" name="date" id="date"  class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"  required value="{{ old('date')}}">
                          </div>
                        </div>
                        @error('date')
                            <p class="text-red-500 font-semibold"> {{ $message}}</p>
                        @enderror
                       
                      </div>

 {{----------------- Force --------------}}

                    <div class="sm:col-span-4">
                    <label for="force" class="block text-sm font-medium leading-6 text-gray-900">Force</label>
                    <div class="mt-2">
                      <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        
                        <input type="number" name="force" id="force" autocomplete="force"  class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="force..." required value="{{ old('force')}}">
                      </div>
                    </div>
        
                    @error('force')
                    <p class="text-red-500 font-semibold"> {{ $message}}</p>
                @enderror
                  </div>
  
  {{-- --------------------- presence------------ ------------}}
                  <div class="sm:col-span-4">
                    <label for="presence" class="block text-sm font-medium leading-6 text-gray-900">Presence</label>
                    <div class="mt-2">
                      <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        
                        <input type="number" name="presence" id="presence"  class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="محتوى الطلب" required value="{{ old('presence')}}">
                        
                        </div>
                    </div>
        
                    @error('presence')
                    <p class="text-red-500 font-semibold"> {{ $message}}</p>
                @enderror
                  </div>
        
                  

 
                {{-- ---------------------- Absence ------------------------------ --}}
  
                <div class="sm:col-span-4">
                    <label for="absence" class="block text-sm font-medium leading-6 text-gray-900">Absence </label>
                    <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        
                        <input type="text" name="absence" id="absence"  class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="الغائبون" value="{{old('absence')}}" required>
                        
                      
                        </div>
                    
                </div>
            @error('absence')
                <p class="text-red-500 font-semibold"> {{ $message}}</p>
            @enderror
  
        </div>
  
  {{-- ------------------------raison ------------------- --}}
  
                  <div class="sm:col-span-4">
                    <label for="raison" class="block text-sm font-medium leading-6 text-gray-900">Raison </label>
                    <div class="mt-2">
                      <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        
                        <input type="text"  name="raison" id="raison" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="السبب..." required >
                     
                        
                    </div>
                    </div>
                    @error('raison')
                        <p class="text-red-500 font-semibold"> {{ $message}}</p>
                    @enderror
                   
                  </div>
  
  
                    </div>
  
                    
             
            <div class="mt-6 flex items-center justify-end gap-x-6">
              <x-button  href="index" class="text-sm font-semibold leading-6 text-gray-900">Cancel</x-button>
              <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
          </form>
          
       
  </x-layout>
  