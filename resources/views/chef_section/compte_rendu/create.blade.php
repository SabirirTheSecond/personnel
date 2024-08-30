<x-layout>

    <x-slot:heading>
        Faire un  compte rendu
    </x-slot:heading>
    
    
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        {{ session('success') }}
    </div>
  @endif
  
  @if(session('error'))
    <div class="alert alert-danger">
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
        <form method="POST" action="/chef_sections">
            
            @csrf
        
            <div class="space-y-12">
              <div class="border-b border-gray-900/10 pb-12">
                {{-- <h2 class="text-base font-semibold leading-7 text-gray-900">Faire un</h2> --}}
                <p class="mt-1 text-sm leading-6 text-gray-600">Entrer les informations </p>
          
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <div class="sm:col-span-4">
                    <label for="titre" class="block text-sm font-medium leading-6 text-gray-900">Titre</label>
                    <div class="mt-2">
                      <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        
                        <input type="text" name="titre" id="titre" autocomplete="titre"  class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="titre.. " required value="{{ old('titre')}}">
                      </div>
                    </div>
        
                    @error('titre')
                    <p class="text-red-500 font-semibold"> {{ $message}}</p>
                @enderror
                  </div>
  
  {{-- --------------------- contenu------------ ------------}}
                  <div class="sm:col-span-4">
                    <label for="contenu" class="block text-sm font-medium leading-6 text-gray-900">Contenu</label>
                    <div class="mt-2">
                      <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        
                        <textarea type="text" name="contenu" id="contenu"  class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="محتوى الطلب" required value="{{ old('contenu')}}">
                        </textarea>
                        </div>
                    </div>
        
                    @error('contenu')
                    <p class="text-red-500 font-semibold"> {{ $message}}</p>
                @enderror
                  </div>
        
                  
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
 
                {{-- ---------------------- Avis admin ------------------------------ --}}
  
                <div class="sm:col-span-4">
                    <label for="avis_admin" class="block text-sm font-medium leading-6 text-gray-900">Avis admin </label>
                    <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        
                        <select name="avis_admin" id="avis_admin"  class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Date de naissance" value="{{old('avis_admin')}}" required>
                        
                          <option value="oui">Oui</option>
                          <option value="non">Non</option>
                        
                      </select>
                        </div>
                    
                </div>
            @error('avis_admin')
                <p class="text-red-500 font-semibold"> {{ $message}}</p>
            @enderror
  
        </div>
  
  {{-- ------------------------avis_chef_unité  ------------------- --}}
  
                  <div class="mb-2 sm:col-span-4">
                    <label for="avis_chef_unité" class="block text-sm font-medium leading-6 text-gray-900">Avis chef unité</label>
                    <div class="mt-2">
                      <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        
                        <select  name="avis_chef_unité" id="avis_chef_unité" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"  >
                     
                          <option value="en attente">En attente</option>
                            <option value="oui">Oui</option>
                            <option value="non">Non</option>
                            
                        </select>
                    </div>
                    </div>
                    @error('avis_chef_unité')
                        <p class="text-red-500 font-semibold"> {{ $message}}</p>
                    @enderror
                   
                  </div>
  
  
                    </div>
  
                    <input type="hidden" name="chef_section_id" value="{{ $chef->id}}">
             
            <div class="mt-6 flex items-center justify-end gap-x-6">
              <button type="button" class="btn btn-danger">Cancel</button>
              <button type="submit" class="btn btn-info text-white">Save</button>
            </div>
          </form>
          
       
  </x-layout>
  