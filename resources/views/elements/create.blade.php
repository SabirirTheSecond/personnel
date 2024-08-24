<x-layout>

  <x-slot:heading>
      Ajouter un Element
      <x-button href="{{ url('/elements/') }} ">Retour</x-button>
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
      <form action="/elements/create" method="POST" >
          
          @csrf
      
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
              <h2 class="text-base font-semibold leading-7 text-gray-900">Ajouter un Element</h2>
              <p class="mt-1 text-sm leading-6 text-gray-600">Entrer les informations </p>
        
              <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                  <label for="nom" class="block text-sm font-medium leading-6 text-gray-900">nom</label>
                  <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                      
                      <input type="text" name="nom" id="nom" autocomplete="nom"  class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="nom" required value="{{ old('nom')}}">
                    </div>
                  </div>
      
                  @error('nom')
                  <p class="text-red-500 font-semibold"> {{ $message}}</p>
              @enderror
                </div>

{{-- --------------------- Prenom------------ ------------}}
                <div class="sm:col-span-4">
                  <label for="prenom" class="block text-sm font-medium leading-6 text-gray-900">prenom</label>
                  <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                      
                      <input type="text" name="prenom" id="prenom"  class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="prenom" required value="{{ old('prenom')}}">
                    </div>
                  </div>
      
                  @error('prenom')
                  <p class="text-red-500 font-semibold"> {{ $message}}</p>
              @enderror
                </div>
      
                
{{----------------- Matricule --------------}}

                <div class="sm:col-span-4">
                  <label for="matricule" class="block text-sm font-medium leading-6 text-gray-900">matricule</label>
                  <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                      
                      <input type="text" name="matricule" id="matricule"  class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="matricule" required value="{{ old('matricule')}}">
                    </div>
                  </div>
                  @error('matricule')
                      <p class="text-red-500 font-semibold"> {{ $message}}</p>
                  @enderror
                 
                </div>
{{-- ---------------------- Section ------------------------------ --}}

                      <div class="sm:col-span-4">
                          <label for="section" class="block text-sm font-medium leading-6 text-gray-900">Section</label>
                          <div class="mt-2">
                          <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                              
                              <input type="text" name="section" id="section"  class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"  placeholder="section" value="{{ old('section')}}">
                              </div>
                          
                      </div>
                  @error('section')
                      <p class="text-red-500 font-semibold"> {{ $message}}</p>
                  @enderror

              </div>
              {{-- ---------------------- Date naissance ------------------------------ --}}

              <div class="sm:col-span-4">
                  <label for="date_naissance" class="block text-sm font-medium leading-6 text-gray-900">Date de naissance </label>
                  <div class="mt-2">
                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                      
                      <input type="date" name="date_naissance" id="date_naissance"  class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Date de naissance" value="{{old('date_naissance')}}">
                      </div>
                  
              </div>
          @error('date_naissance')
              <p class="text-red-500 font-semibold"> {{ $message}}</p>
          @enderror

      </div>

{{-- ------------------------situation Familliale ------------------- --}}

                <div class="sm:col-span-4">
                  <label for="situation_familliale" class="block text-sm font-medium leading-6 text-gray-900">situation Familliale</label>
                  <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                      
                      <select  name="situation_familliale" id="situation_familliale" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"  >
                   
                          <option value="célibataire">Célibataire</option>
                          <option value="marié">Marié</option>
                          <option value="divorcé">Divorcé</option>
                          <option value="veuf">Veuf</option>
                      </select>
                  </div>
                  </div>
                  @error('situation_familliale')
                      <p class="text-red-500 font-semibold"> {{ $message}}</p>
                  @enderror
                 
                </div>

{{------------------------ Lieu de travaille --------------------------}}

                <div class="sm:col-span-4">
                  <label for="ancien_lieu" class="block text-sm font-medium leading-6 text-gray-900">Ancien lieu de travail</label>
                  <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                      
                      <input type="text" name="ancien_lieu" id="ancien_lieu"  class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="الكتيبة 33 مشاة مستقلة" value="{{old('ancien_lieu')}}">
                    </div>
                  </div>
                  @error('ancien_lieu')
                      <p class="text-red-500 font-semibold"> {{ $message}}</p>
                  @enderror
                 
                </div>

{{------------------------- Photo ------------------- --}}

                <div class="sm:col-span-4">
                  <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                  <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                      
                      <input type="file" name="photo" id="photo" accept="image/*"  class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"  >
                    </div>
                  </div>
                  @error('photo')
                      <p class="text-red-500 font-semibold"> {{ $message}}</p>
                  @enderror
                 
                </div>
                
{{-- ------------- Vehicule---------- --}}
                <div class="sm:col-span-4">
                  <label for="vehiculé" class="block text-sm font-medium leading-6 text-gray-900">Vehicule</label>
                  <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                      
                      <select  name="vehiculé" id="vehiculé"   class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"  value="{{old('vehiculé')}}">
                          <option value="oui">Oui</option>
                          <option value="non">Non</option>
                      </select>
                    </div>
                  </div>
                  @error('vehiculé')
                      <p class="text-red-500 font-semibold"> {{ $message}}</p>
                  @enderror
                 
                </div>
              
  {{----------------- Groupe Sanguin----------------}}
                <div class="sm:col-span-4">
                  <label for="groupe_sanguin" class="block text-sm font-medium leading-6 text-gray-900">Groupe Sanguin</label>
                  <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                      
                      <select  name="groupe_sanguin" id="groupe_sanguin"   class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value="{{old('groupe_sanguin')}}" >
                          <option value="A+">A+</option>
                          <option value="A-">A-</option>
                          <option value="B+">B+</option>
                          <option value="B-">B-</option>
                          <option value="AB+">AB+</option>
                          <option value="AB-">AB-</option>
                          <option value="O+">O+</option>
                          <option value="O-">O-</option>
                      </select>
                    </div>
                  </div>
                  @error('groupe_sanguin')
                      <p class="text-red-500 font-semibold"> {{ $message}}</p>
                  @enderror
                 
                </div>

{{-- ---------------- Arme------------- --}}
                  <div class="sm:col-span-4">
                      <label for="arme" class="block text-sm font-medium leading-6 text-gray-900">Arme</label>
                      <div class="mt-2">
                      <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                          
                          <input type="text" name="arme" id="arme"  class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"  value="{{old('arme')}}">
                      </div>
                      </div>
                      @error('arme')
                          <p class="text-red-500 font-semibold"> {{ $message}}</p>
                      @enderror
                  
                  </div>

                  
           
          <div class="mt-6 flex items-center justify-end gap-x-6">
            <x-button href="/elements">Cancel</x-button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
          </div>
        </form>
        
     
</x-layout>
