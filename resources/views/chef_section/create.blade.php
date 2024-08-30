<x-layout>

  <x-slot:heading>
      Ajouter un Chef Section 
      <x-button href="{{ url('/chef_sections/') }} ">Retour</x-button>
  </x-slot:heading>
  
  
  @if(session('success'))
  <div class="alert alert-success" role="alert">
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
      <form action="/chef_sections/create" method="POST" class=" ">
          
        <fieldset class="shadow-lg bg-white rounded">

          @csrf
      
          <div class="mt-3 mb-3 row g-3 align-items-center">
            <div class="col-auto">
              <label for="nom" class="col-form-label">Nom</label>
            </div>
            <div class="col-auto">
              <input type="text" name="nom" class="form-control" value ="{{old('nom')}}">

            </div>
            @error('nom')
            <p class="danger"> {{ $message}}</p>
        @enderror
          </div>

            <div class="mb-3 row g-3 align-items-center">
              <div class="col-auto">
                <label for="prenom" class="col-form-label">Prenom</label>
              </div>
              <div class="col-auto">
                <input type="text" name="prenom" class="form-control" required value="{{old('prenom')}}">
              </div>
              @error('prenom')
            <p class="danger"> {{ $message}}</p>
        @enderror
            </div>
            {{-- ------------------------------  --}}
            <div class="mb-3 row g-3 align-items-center">
              <div class="col-auto">
                <label for="matricule" class="col-form-label">Matricule</label>
              </div>
              <div class="col-auto">
                <input type="text" name="matricule" class="form-control" required value="{{old('matricule')}}">
              </div>
              @error('matricule')
            <p class="danger"> {{ $message}}</p>
        @enderror
            </div>
           {{-- ----------------------- --}}
            <div class="mb-3 row g-3 align-items-center">
              <div class="col-auto">
                <label for="section" class="col-form-label">Section</label>
              </div>
              <div class="col-auto">
                <input type="text" name="section" class="form-control" required value="{{old('section')}}">
              </div>
              @error('section')
            <p class="danger"> {{ $message}}</p>
        @enderror
            </div>
           {{-- -------------------------------------- --}}

           <div class="mb-3 row g-3 align-items-center">
            <div class="col-auto">
              <label for="date_naissance" class="col-form-label">Date de naissance</label>
            </div>
            <div class="col-auto">
              <input type="date" name="date_naissance" class="form-control" required value="{{old('date_naissance')}}" required>
            </div>
            @error('date_naissance')
          <p class="danger"> {{ $message}}</p>
      @enderror
          </div>
              
        
{{-- ------------------------situation Familliale ------------------- --}}

          <div class="mb-3 row g-3 align-items-center">
            <div class="col-auto">
              <label for="situation_familliale" class="col-form-label">Situation Familliale</label>
            </div>
            <div class="col-auto">
              <select  name="situation_familliale" 
                  class="form-control" required value="{{old('situation_familliale')}}" >
              <option value="célibataire">Célibataire</option>
              <option value="marié">Marié</option>
              <option value="divorcé">Divorcé</option>
              <option value="veuf">Veuf</option>
              </select>
            </div>
            @error('situation_familliale')
          <p class="danger"> {{ $message}}</p>
          @enderror
          </div>

{{------------------------- Photo ------------------- --}}

<div class="mb-3 row g-3 align-items-center">
  <div class="col-auto">
    <label for="photo" class="col-form-label">Photo</label>
  </div>
  <div class="col-auto">
    <input type="file"  name="photo" 
        class="form-control"  value="{{old('photo')}}" >
    
  </div>
  @error('photo')
<p class="danger"> {{ $message}}</p>
@enderror
</div>
                
{{-- ------------- Vehicule---------- --}}
        <div class="mb-3 row g-3 align-items-center">
          <div class="col-auto">
            <label for="vehiculé" class="col-form-label">Vehiculé</label>
          </div>
          <div class="col-auto">
            <select name="vehiculé" class="form-control" required value="{{old('vehiculé')}}" required>
              <option value="non">Non</option>
              <option value="oui">Oui</option>
            </select>
          </div>
          @error('vehiculé')
        <p class="danger"> {{ $message}}</p>
        @enderror
        </div>
              
  {{----------------- Groupe Sanguin----------------}}

        <div class="mb-3 row g-3 align-items-center">
          <div class="col-auto">
            <label for="groupe_sanguin" class="col-form-label">Groupe Sanguin</label>
          </div>
          <div class="col-auto">
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
          @error('groupe_sanguin')
        <p class="danger"> {{ $message}}</p>
        @enderror
        </div>


{{-- ---------------- Arme------------- --}}
          <div class="mb-3 row g-3 align-items-center">
            <div class="col-auto">
              <label for="arme" class="col-form-label">Arme</label>
            </div>
            <div class="col-auto">
              <input type="text" name="arme" class="form-control" required value="{{old('arme')}}" required>
            </div>
            @error('arme')
          <p class="danger"> {{ $message}}</p>
          @enderror
          </div>

                  
           
          <div class=" mb-3 mt-6 flex items-center justify-end gap-x-6">
            <x-button href="/chef_sections">Cancel</x-button>
            <button type="submit" 
            class=" btn btn-info">Save</button>
          </div>
        
        </fieldset>   
    </form>
        
     
</x-layout>
