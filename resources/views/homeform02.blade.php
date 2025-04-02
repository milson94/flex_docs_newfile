{{-- resources/views/homeform02.blade.php --}}
@extends('layouts.app')

@section('content')
{{-- The sidebar is optional, include if needed --}}
{{-- <div class="flex min-h-screen"> --}}
    {{-- Sidebar (Hidden on Mobile) --}}
    {{-- <div class="w-64 bg-white shadow-lg hidden md:block"> --}}
        {{-- @include('partials.sidebar') --}}
    {{-- </div> --}}

    {{-- Main Content Area --}}
    {{-- Adjust padding/margins if you remove the sidebar flex container --}}
    <div class="flex-1 md:ml-0"> {{-- Removed p-8, using container padding from layout now --}}
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Preencha os Detalhes do Seu CV</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded mb-6 shadow" role="alert">
                <p class="font-bold">Sucesso!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded mb-6 shadow" role="alert">
                 <p class="font-bold">Por favor, corrija os erros abaixo:</p>
                <ul class="mt-2 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- CV Form -->
        {{-- The form action points to the route that will process the data and show the template preview/selection --}}
        <form method="POST" action="{{ route('cv.preview') }}" class="bg-white p-8 rounded-lg shadow-lg">
            @csrf

            <!-- Hidden Input for Template - This might be set by a controller or previous step -->
            {{-- If linking directly to this form, this value might be empty or irrelevant initially --}}
            <input type="hidden" name="template" value="{{ request()->query('template', 'default') }}"> {{-- Provide a default maybe? --}}

            <!-- Personal Details Section -->
            <fieldset class="mb-8 border border-gray-300 p-6 rounded-lg">
                <legend class="text-xl font-semibold text-gray-800 mb-4 px-2">Detalhes Pessoais</legend>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- First Name --}}
                    <div>
                        <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">Primeiro Nome <span class="text-red-500">*</span></label>
                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('first_name') border-red-500 @enderror"
                            placeholder="Ex: João"
                            value="{{ old('first_name') }}"
                        >
                        @error('first_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    {{-- Last Name --}}
                    <div>
                        <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Sobrenome <span class="text-red-500">*</span></label>
                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('last_name') border-red-500 @enderror"
                            placeholder="Ex: Silva"
                            value="{{ old('last_name') }}"
                        >
                         @error('last_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    {{-- Role --}}
                    <div>
                        <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Cargo Desejado <span class="text-red-500">*</span></label>
                        <input
                            type="text"
                            id="role"
                            name="role"
                            required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('role') border-red-500 @enderror"
                            placeholder="Ex: Desenvolvedor Web"
                            value="{{ old('role') }}"
                        >
                         @error('role') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email <span class="text-red-500">*</span></label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                            placeholder="Ex: joao.silva@email.com"
                            value="{{ old('email') }}"
                        >
                         @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    {{-- LinkedIn/Portfolio --}}
                    <div>
                        <label for="linkedin" class="block text-gray-700 text-sm font-bold mb-2">LinkedIn / Portfólio (URL)</label>
                        <input
                            type="url" {{-- Use type="url" for better validation --}}
                            id="linkedin"
                            name="linkedin"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('linkedin') border-red-500 @enderror"
                            placeholder="https://linkedin.com/in/..."
                            value="{{ old('linkedin') }}"
                        >
                         @error('linkedin') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    {{-- Location --}}
                    <div>
                        <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Localização</label>
                        <input
                            type="text"
                            id="location"
                            name="location"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('location') border-red-500 @enderror"
                            placeholder="Ex: Maputo, Moçambique"
                            value="{{ old('location') }}"
                        >
                         @error('location') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                     {{-- Phone Number --}}
                     <div>
                        <label for="phone_number" class="block text-gray-700 text-sm font-bold mb-2">Telefone</label>
                        <input
                            type="tel" {{-- Use type="tel" --}}
                            id="phone_number"
                            name="phone_number"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('phone_number') border-red-500 @enderror"
                            placeholder="Ex: +258 84 123 4567"
                            value="{{ old('phone_number') }}"
                        >
                         @error('phone_number') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    {{-- Date of Birth --}}
                    <div>
                        <label for="date_of_birth" class="block text-gray-700 text-sm font-bold mb-2">Data de Nascimento</label>
                        <input
                            type="date"
                            id="date_of_birth"
                            name="date_of_birth"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('date_of_birth') border-red-500 @enderror"
                            value="{{ old('date_of_birth') }}"
                            max="{{ date('Y-m-d') }}" {{-- Prevent future dates --}}
                        >
                         @error('date_of_birth') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                     {{-- Place of Birth --}}
                     <div>
                        <label for="place_of_birth" class="block text-gray-700 text-sm font-bold mb-2">Local de Nascimento</label>
                        <input
                            type="text"
                            id="place_of_birth"
                            name="place_of_birth"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('place_of_birth') border-red-500 @enderror"
                            placeholder="Ex: Beira"
                            value="{{ old('place_of_birth') }}"
                        >
                         @error('place_of_birth') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    {{-- Nationality --}}
                    <div>
                        <label for="nationality" class="block text-gray-700 text-sm font-bold mb-2">Nacionalidade</label>
                        <input
                            type="text"
                            id="nationality"
                            name="nationality"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nationality') border-red-500 @enderror"
                            placeholder="Ex: Moçambicana"
                            value="{{ old('nationality') }}"
                        >
                         @error('nationality') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                     {{-- Gender --}}
                     <div>
                        <label for="gender" class="block text-gray-700 text-sm font-bold mb-2">Gênero</label>
                        <select
                            id="gender"
                            name="gender"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white @error('gender') border-red-500 @enderror"
                        >
                            <option value="">Selecione (Opcional)</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Masculino</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Feminino</option>
                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Outro</option>
                            <option value="prefer_not_to_say" {{ old('gender') == 'prefer_not_to_say' ? 'selected' : '' }}>Prefiro não dizer</option>
                        </select>
                        @error('gender') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </fieldset>

            <!-- Summary Section -->
            <fieldset class="mb-8 border border-gray-300 p-6 rounded-lg">
                <legend class="text-xl font-semibold text-gray-800 mb-4 px-2">Resumo Profissional</legend>
                <label for="summary" class="sr-only">Resumo</label> {{-- Screen reader only label --}}
                <textarea
                    id="summary"
                    name="summary"
                    rows="5"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('summary') border-red-500 @enderror"
                    placeholder="Descreva brevemente sua experiência, habilidades chave e objetivos de carreira. Destaque por que você é um bom candidato para o cargo."
                >{{ old('summary') }}</textarea>
                 @error('summary') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </fieldset>

            <!-- Experience Section -->
            <fieldset class="mb-8 border border-gray-300 p-6 rounded-lg">
                <legend class="text-xl font-semibold text-gray-800 mb-4 px-2">Experiência Profissional</legend>
                <div id="experience-fields" class="space-y-6">
                    {{-- Loop through old experience data or display one empty block --}}
                    @forelse (old('experience', [[]]) as $index => $exp) {{-- Default to one empty array item --}}
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 experience-field relative">
                             {{-- Add Remove Button for all but the first block initially --}}
                             @if($loop->index > 0 || count(old('experience', [])) > 1)
                             <button
                                 type="button"
                                 class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded-full text-xs hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-1 remove-experience"
                                 title="Remover Experiência"
                             >
                                 ✕ {{-- Multiplication sign (X) --}}
                             </button>
                             @endif

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- Company Name --}}
                                <div>
                                    <label for="experience_{{ $index }}_company_name" class="block text-gray-700 text-sm font-bold mb-2">Nome da Empresa</label>
                                    <input
                                        type="text"
                                        id="experience_{{ $index }}_company_name"
                                        name="experience[{{ $index }}][company_name]"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('experience.'.$index.'.company_name') border-red-500 @enderror"
                                        placeholder="Nome da Empresa"
                                        value="{{ old('experience.'.$index.'.company_name') }}"
                                    >
                                     @error('experience.'.$index.'.company_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                                {{-- Job Title --}}
                                <div>
                                    <label for="experience_{{ $index }}_title" class="block text-gray-700 text-sm font-bold mb-2">Cargo</label>
                                    <input
                                        type="text"
                                        id="experience_{{ $index }}_title"
                                        name="experience[{{ $index }}][title]"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('experience.'.$index.'.title') border-red-500 @enderror"
                                        placeholder="Seu Cargo"
                                        value="{{ old('experience.'.$index.'.title') }}"
                                    >
                                     @error('experience.'.$index.'.title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                                {{-- Start Date --}}
                                <div>
                                    <label for="experience_{{ $index }}_start_date" class="block text-gray-700 text-sm font-bold mb-2">Data de Início</label>
                                    <input
                                        type="month" {{-- Use type="month" for month/year --}}
                                        id="experience_{{ $index }}_start_date"
                                        name="experience[{{ $index }}][start_date]"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('experience.'.$index.'.start_date') border-red-500 @enderror"
                                        value="{{ old('experience.'.$index.'.start_date') }}"
                                        pattern="\d{4}-\d{2}" {{-- Basic pattern for yyyy-mm --}}
                                    >
                                     @error('experience.'.$index.'.start_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                                {{-- End Date --}}
                                <div>
                                    <label for="experience_{{ $index }}_end_date" class="block text-gray-700 text-sm font-bold mb-2">Data de Término</label>
                                    <input
                                        type="month" {{-- Use type="month" --}}
                                        id="experience_{{ $index }}_end_date"
                                        name="experience[{{ $index }}][end_date]"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 end-date-input @error('experience.'.$index.'.end_date') border-red-500 @enderror"
                                        value="{{ old('experience.'.$index.'.end_date') }}"
                                        pattern="\d{4}-\d{2}"
                                        {{ old('experience.'.$index.'.current') ? 'disabled' : '' }} {{-- Disable if 'current' was checked --}}
                                    >
                                     @error('experience.'.$index.'.end_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                                {{-- Current Job Checkbox --}}
                                <div class="flex items-center md:col-span-2"> {{-- Span across two columns on medium screens if needed --}}
                                    <input
                                        type="checkbox"
                                        id="experience_{{ $index }}_current"
                                        name="experience[{{ $index }}][current]"
                                        value="1"
                                        class="mr-2 h-4 w-4 border-gray-300 rounded text-blue-600 focus:ring-blue-500 current-job-checkbox"
                                        {{ old('experience.'.$index.'.current') ? 'checked' : '' }}
                                    >
                                    <label for="experience_{{ $index }}_current" class="text-gray-700 text-sm font-bold">Trabalho Atual</label>
                                </div>
                            </div>
                            {{-- Company Description --}}
                            <div class="mt-4">
                                <label for="experience_{{ $index }}_company_description" class="block text-gray-700 text-sm font-bold mb-2">Descrição da Empresa (Opcional)</label>
                                <textarea
                                    id="experience_{{ $index }}_company_description"
                                    name="experience[{{ $index }}][company_description]"
                                    rows="2"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('experience.'.$index.'.company_description') border-red-500 @enderror"
                                    placeholder="Breve descrição da empresa e sua área de atuação."
                                >{{ old('experience.'.$index.'.company_description') }}</textarea>
                                 @error('experience.'.$index.'.company_description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            {{-- Achievements --}}
                            <div class="mt-4">
                                <label for="experience_{{ $index }}_achievements" class="block text-gray-700 text-sm font-bold mb-2">Principais Conquistas (Opcional)</label>
                                <textarea
                                    id="experience_{{ $index }}_achievements"
                                    name="experience[{{ $index }}][achievements]"
                                    rows="3"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('experience.'.$index.'.achievements') border-red-500 @enderror"
                                    placeholder="Liste suas principais conquistas e resultados quantificáveis. Ex: Aumentei as vendas em 15% no primeiro trimestre."
                                >{{ old('experience.'.$index.'.achievements') }}</textarea>
                                 @error('experience.'.$index.'.achievements') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            {{-- Duties/Responsibilities --}}
                            <div class="mt-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Principais Responsabilidades</label>
                                <div class="duties-fields space-y-2">
                                    {{-- Loop through old duties or show one empty field --}}
                                    @forelse(old('experience.'.$index.'.duties', ['']) as $dutyIndex => $duty)
                                    <div class="flex items-center space-x-2 duty-field">
                                        <input
                                            type="text"
                                            name="experience[{{ $index }}][duties][]" {{-- Array notation --}}
                                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 flex-grow @error('experience.'.$index.'.duties.'.$dutyIndex) border-red-500 @enderror"
                                            placeholder="Descreva uma responsabilidade"
                                            value="{{ $duty }}"
                                        >
                                        {{-- Show remove button only if more than one duty exists or potentially always for dynamic removal --}}
                                        {{-- @if($loop->index > 0 || count(old('experience.'.$index.'.duties', [])) > 1) --}}
                                        <button type="button" class="remove-duty text-red-500 hover:text-red-700 text-sm p-1 rounded hover:bg-red-100" title="Remover Responsabilidade">-</button>
                                        {{-- @endif --}}
                                         @error('experience.'.$index.'.duties.'.$dutyIndex) <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    @empty
                                        {{-- Ensure at least one empty field if no old data --}}
                                        <div class="flex items-center space-x-2 duty-field">
                                            <input
                                                type="text"
                                                name="experience[{{ $index }}][duties][]"
                                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 flex-grow"
                                                placeholder="Descreva uma responsabilidade"
                                                value=""
                                            >
                                            <button type="button" class="remove-duty text-red-500 hover:text-red-700 text-sm p-1 rounded hover:bg-red-100" title="Remover Responsabilidade">-</button>
                                        </div>
                                    @endforelse
                                </div>
                                <div class="mt-2 flex justify-start">
                                    <button
                                        type="button"
                                        class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 add-duty text-sm transition duration-200"
                                    >
                                        + Adicionar Responsabilidade
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                         {{-- Fallback if old('experience') is completely empty (shouldn't happen with default [[]]) --}}
                         {{-- You might want to copy the structure from the @forelse block here for a truly empty initial state --}}
                    @endforelse
                </div>
                <!-- Add Experience Button -->
                <div class="mt-6 border-t pt-4">
                    <button
                        type="button"
                        id="add-experience"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-1 transition duration-200"
                    >
                       + Adicionar Outra Experiência
                    </button>
                </div>
            </fieldset>

            <!-- Education Section -->
            <fieldset class="mb-8 border border-gray-300 p-6 rounded-lg">
                 <legend class="text-xl font-semibold text-gray-800 mb-4 px-2">Educação</legend>
                 <div id="education-fields" class="space-y-6">
                    @forelse(old('education', [[]]) as $index => $edu)
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 education-field relative">
                             @if($loop->index > 0 || count(old('education', [])) > 1)
                             <button
                                 type="button"
                                 class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded-full text-xs hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-1 remove-education"
                                 title="Remover Educação"
                             >
                                 ✕
                             </button>
                             @endif
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- Institution --}}
                                <div>
                                    <label for="education_{{ $index }}_school" class="block text-gray-700 text-sm font-bold mb-2">Instituição de Ensino</label>
                                    <input
                                        type="text"
                                        id="education_{{ $index }}_school"
                                        name="education[{{ $index }}][school]"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('education.'.$index.'.school') border-red-500 @enderror"
                                        placeholder="Ex: Universidade Eduardo Mondlane"
                                        value="{{ old('education.'.$index.'.school') }}"
                                    >
                                     @error('education.'.$index.'.school') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                                {{-- Degree --}}
                                <div>
                                    <label for="education_{{ $index }}_degree" class="block text-gray-700 text-sm font-bold mb-2">Grau e Área de Estudo</label>
                                    <input
                                        type="text"
                                        id="education_{{ $index }}_degree"
                                        name="education[{{ $index }}][degree]"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('education.'.$index.'.degree') border-red-500 @enderror"
                                        placeholder="Ex: Licenciatura em Engenharia Informática"
                                        value="{{ old('education.'.$index.'.degree') }}"
                                    >
                                     @error('education.'.$index.'.degree') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                                {{-- Year of Completion --}}
                                <div class="md:col-span-2">
                                    <label for="education_{{ $index }}_year_of_completion" class="block text-gray-700 text-sm font-bold mb-2">Ano de Conclusão</label>
                                    <select
                                        id="education_{{ $index }}_year_of_completion"
                                        name="education[{{ $index }}][year_of_completion]"
                                        class="w-full md:w-1/2 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white @error('education.'.$index.'.year_of_completion') border-red-500 @enderror"
                                    >
                                        <option value="">Selecione o Ano</option>
                                        @for ($year = date('Y') + 2; $year >= 1950; $year--) {{-- Allow future years slightly --}}
                                            <option value="{{ $year }}" {{ old('education.'.$index.'.year_of_completion') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                        @endfor
                                    </select>
                                     @error('education.'.$index.'.year_of_completion') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>
                    @empty
                        {{-- Fallback structure --}}
                    @endforelse
                </div>
                <!-- Add Education Button -->
                 <div class="mt-6 border-t pt-4">
                    <button
                        type="button"
                        id="add-education"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-1 transition duration-200"
                    >
                        + Adicionar Outra Formação
                    </button>
                </div>
            </fieldset>

             <!-- Languages Section -->
            <fieldset class="mb-8 border border-gray-300 p-6 rounded-lg">
                 <legend class="text-xl font-semibold text-gray-800 mb-4 px-2">Idiomas</legend>
                 <div id="language-fields" class="space-y-6">
                     @forelse(old('languages', [[]]) as $index => $lang)
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 language-field relative">
                            @if($loop->index > 0 || count(old('languages', [])) > 1)
                             <button
                                 type="button"
                                 class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded-full text-xs hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-1 remove-language"
                                 title="Remover Idioma"
                             >
                                 ✕
                             </button>
                             @endif
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                {{-- Language Name --}}
                                <div>
                                    <label for="languages_{{ $index }}_language" class="block text-gray-700 text-sm font-bold mb-2">Idioma</label>
                                    <input
                                        type="text"
                                        id="languages_{{ $index }}_language"
                                        name="languages[{{ $index }}][language]"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('languages.'.$index.'.language') border-red-500 @enderror"
                                        placeholder="Ex: Inglês"
                                        value="{{ old('languages.'.$index.'.language') }}"
                                    >
                                     @error('languages.'.$index.'.language') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                                {{-- Speaking Level --}}
                                <div>
                                    <label for="languages_{{ $index }}_speaking_level" class="block text-gray-700 text-sm font-bold mb-2">Conversação</label>
                                    <select
                                        id="languages_{{ $index }}_speaking_level"
                                        name="languages[{{ $index }}][speaking_level]"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white @error('languages.'.$index.'.speaking_level') border-red-500 @enderror"
                                    >
                                        <option value="">Selecione Nível</option>
                                        <option value="native" {{ old('languages.'.$index.'.speaking_level') == 'native' ? 'selected' : '' }}>Nativo</option>
                                        <option value="fluent" {{ old('languages.'.$index.'.speaking_level') == 'fluent' ? 'selected' : '' }}>Fluente (C1/C2)</option>
                                        <option value="advanced" {{ old('languages.'.$index.'.speaking_level') == 'advanced' ? 'selected' : '' }}>Avançado (B2)</option>
                                        <option value="intermediate" {{ old('languages.'.$index.'.speaking_level') == 'intermediate' ? 'selected' : '' }}>Intermédio (B1)</option>
                                        <option value="basic" {{ old('languages.'.$index.'.speaking_level') == 'basic' ? 'selected' : '' }}>Básico (A1/A2)</option>
                                    </select>
                                     @error('languages.'.$index.'.speaking_level') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                                {{-- Reading Level --}}
                                <div>
                                    <label for="languages_{{ $index }}_reading_level" class="block text-gray-700 text-sm font-bold mb-2">Leitura</label>
                                    <select
                                        id="languages_{{ $index }}_reading_level"
                                        name="languages[{{ $index }}][reading_level]"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white @error('languages.'.$index.'.reading_level') border-red-500 @enderror"
                                    >
                                         <option value="">Selecione Nível</option>
                                         <option value="native" {{ old('languages.'.$index.'.reading_level') == 'native' ? 'selected' : '' }}>Nativo</option>
                                         <option value="fluent" {{ old('languages.'.$index.'.reading_level') == 'fluent' ? 'selected' : '' }}>Fluente (C1/C2)</option>
                                         <option value="advanced" {{ old('languages.'.$index.'.reading_level') == 'advanced' ? 'selected' : '' }}>Avançado (B2)</option>
                                         <option value="intermediate" {{ old('languages.'.$index.'.reading_level') == 'intermediate' ? 'selected' : '' }}>Intermédio (B1)</option>
                                         <option value="basic" {{ old('languages.'.$index.'.reading_level') == 'basic' ? 'selected' : '' }}>Básico (A1/A2)</option>
                                    </select>
                                     @error('languages.'.$index.'.reading_level') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                                {{-- Writing Level --}}
                                <div>
                                    <label for="languages_{{ $index }}_writing_level" class="block text-gray-700 text-sm font-bold mb-2">Escrita</label>
                                    <select
                                        id="languages_{{ $index }}_writing_level"
                                        name="languages[{{ $index }}][writing_level]"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white @error('languages.'.$index.'.writing_level') border-red-500 @enderror"
                                    >
                                         <option value="">Selecione Nível</option>
                                         <option value="native" {{ old('languages.'.$index.'.writing_level') == 'native' ? 'selected' : '' }}>Nativo</option>
                                         <option value="fluent" {{ old('languages.'.$index.'.writing_level') == 'fluent' ? 'selected' : '' }}>Fluente (C1/C2)</option>
                                         <option value="advanced" {{ old('languages.'.$index.'.writing_level') == 'advanced' ? 'selected' : '' }}>Avançado (B2)</option>
                                         <option value="intermediate" {{ old('languages.'.$index.'.writing_level') == 'intermediate' ? 'selected' : '' }}>Intermédio (B1)</option>
                                         <option value="basic" {{ old('languages.'.$index.'.writing_level') == 'basic' ? 'selected' : '' }}>Básico (A1/A2)</option>
                                    </select>
                                    @error('languages.'.$index.'.writing_level') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>
                     @empty
                        {{-- Fallback structure --}}
                     @endforelse
                 </div>
                 <!-- Add Language Button -->
                 <div class="mt-6 border-t pt-4">
                    <button
                        type="button"
                        id="add-language"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-1 transition duration-200"
                    >
                        + Adicionar Outro Idioma
                    </button>
                </div>
            </fieldset>

            <!-- Skills Section -->
            <fieldset class="mb-8 border border-gray-300 p-6 rounded-lg">
                <legend class="text-xl font-semibold text-gray-800 mb-4 px-2">Habilidades</legend>
                <label for="skills" class="sr-only">Habilidades</label>
                <textarea
                    id="skills"
                    name="skills"
                    rows="4"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('skills') border-red-500 @enderror"
                    placeholder="Liste suas habilidades técnicas e interpessoais relevantes. Ex: JavaScript, React, Node.js, Gestão de Projetos, Comunicação Eficaz, Liderança de Equipa, Resolução de Problemas."
                >{{ old('skills') }}</textarea>
                <small class="text-gray-500 block mt-1">Separe as habilidades por vírgula ( , ) ou coloque uma por linha.</small>
                 @error('skills') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </fieldset>

             <!-- Additional Information Section -->
            <fieldset class="mb-8 border border-gray-300 p-6 rounded-lg">
                <legend class="text-xl font-semibold text-gray-800 mb-4 px-2">Informações Adicionais (Opcional)</legend>
                <p class="text-sm text-gray-600 mb-4">Inclua aqui informações como certificados, cursos, prémios, voluntariado, carta de condução, etc.</p>
                <div id="additional-info-fields" class="space-y-2">
                     @forelse(old('additional_information', ['']) as $index => $info)
                        <div class="additional-info-field flex items-center space-x-2">
                            <input
                                type="text"
                                name="additional_information[]"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 flex-grow @error('additional_information.'.$index) border-red-500 @enderror"
                                placeholder="Ex: Certificado PMP, Curso Avançado de Excel"
                                value="{{ $info }}"
                            >
                            <button type="button" class="remove-additional-info text-red-500 hover:text-red-700 text-sm p-1 rounded hover:bg-red-100" title="Remover Informação">-</button>
                            @error('additional_information.'.$index) <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                     @empty
                        <div class="additional-info-field flex items-center space-x-2">
                            <input
                                type="text"
                                name="additional_information[]"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 flex-grow"
                                placeholder="Ex: Certificado PMP, Curso Avançado de Excel"
                                value=""
                            >
                            <button type="button" class="remove-additional-info text-red-500 hover:text-red-700 text-sm p-1 rounded hover:bg-red-100" title="Remover Informação">-</button>
                        </div>
                     @endforelse
                </div>
                <div class="mt-3 flex justify-start">
                    <button
                        type="button"
                        id="add-additional-info"
                        class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 text-sm transition duration-200"
                    >
                        + Adicionar Outra Informação
                    </button>
                </div>
            </fieldset>

            <!-- References Section -->
            <fieldset class="mb-8 border border-gray-300 p-6 rounded-lg">
                 <legend class="text-xl font-semibold text-gray-800 mb-4 px-2">Referências (Opcional)</legend>
                 <p class="text-sm text-gray-600 mb-4">Forneça referências profissionais se solicitado ou se achar relevante. Pode também indicar "Referências disponíveis mediante solicitação".</p>
                 <div id="reference-fields" class="space-y-6">
                    @forelse(old('references', [[]]) as $index => $ref)
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 reference-field relative">
                             @if($loop->index > 0 || count(old('references', [])) > 1)
                             <button
                                 type="button"
                                 class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded-full text-xs hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-1 remove-reference"
                                 title="Remover Referência"
                             >
                                 ✕
                             </button>
                             @endif
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                {{-- Reference Name --}}
                                <div>
                                    <label for="references_{{ $index }}_reference_name" class="block text-gray-700 text-sm font-bold mb-2">Nome</label>
                                    <input
                                        type="text"
                                        id="references_{{ $index }}_reference_name"
                                        name="references[{{ $index }}][reference_name]"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('references.'.$index.'.reference_name') border-red-500 @enderror"
                                        placeholder="Nome Completo"
                                        value="{{ old('references.'.$index.'.reference_name') }}"
                                    >
                                     @error('references.'.$index.'.reference_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                                {{-- Reference Position/Company --}}
                                <div>
                                    <label for="references_{{ $index }}_reference_position" class="block text-gray-700 text-sm font-bold mb-2">Cargo e Empresa</label>
                                    <input
                                        type="text"
                                        id="references_{{ $index }}_reference_position"
                                        name="references[{{ $index }}][reference_position]"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('references.'.$index.'.reference_position') border-red-500 @enderror"
                                        placeholder="Ex: Gerente de Vendas, Empresa X"
                                        value="{{ old('references.'.$index.'.reference_position') }}"
                                    >
                                     @error('references.'.$index.'.reference_position') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                                {{-- Reference Phone/Email --}}
                                <div>
                                    <label for="references_{{ $index }}_reference_phone" class="block text-gray-700 text-sm font-bold mb-2">Telefone ou Email</label>
                                    <input
                                        type="text" {{-- Allow both tel and email --}}
                                        id="references_{{ $index }}_reference_phone"
                                        name="references[{{ $index }}][reference_phone]"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('references.'.$index.'.reference_phone') border-red-500 @enderror"
                                        placeholder="Contacto da Referência"
                                        value="{{ old('references.'.$index.'.reference_phone') }}"
                                    >
                                     @error('references.'.$index.'.reference_phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>
                    @empty
                        {{-- Fallback structure --}}
                    @endforelse
                 </div>
                 <!-- Add Reference Button -->
                <div class="mt-6 border-t pt-4">
                    <button
                        type="button"
                        id="add-reference"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-1 transition duration-200"
                    >
                        + Adicionar Outra Referência
                    </button>
                </div>
            </fieldset>

            <!-- Submit Button -->
            <div class="mt-8 text-center">
                <button
                    type="submit"
                    class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-200 text-lg font-semibold"
                >
                    Visualizar & Escolher Template
                    {{-- Or maybe "Salvar e Continuar" or "Gerar CV" --}}
                </button>
            </div>
        </form>
    </div>
{{-- </div> --}} {{-- End of flex container if using sidebar --}}
@endsection

{{-- Push the form-specific JavaScript to the 'scripts' stack in the layout --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // --- Initialization ---
    // Indices are now primarily managed by the updateFieldIndices function after add/remove
    const experienceFieldsContainer = document.getElementById('experience-fields');
    const educationFieldsContainer = document.getElementById('education-fields');
    const languageFieldsContainer = document.getElementById('language-fields');
    const referenceFieldsContainer = document.getElementById('reference-fields');
    const additionalInfoFieldsContainer = document.getElementById('additional-info-fields');

    // --- Helper Function to Reset Fields in a Cloned Element ---
    function resetFields(element) {
        element.querySelectorAll('input[type="text"], input[type="date"], input[type="month"], input[type="email"], input[type="tel"], input[type="url"], textarea').forEach(field => field.value = '');
        element.querySelectorAll('select').forEach(select => select.selectedIndex = 0);
        element.querySelectorAll('input[type="checkbox"]').forEach(checkbox => checkbox.checked = false);

        // Specifically handle 'current job' checkbox state and end date
        const currentJobCheckbox = element.querySelector('.current-job-checkbox');
        if (currentJobCheckbox) {
            const endDateInput = element.querySelector('.end-date-input');
            if (endDateInput) {
                endDateInput.disabled = false; // Ensure end date is enabled on clone
                endDateInput.value = '';
            }
        }

        // Specifically handle dynamic 'duties' fields within experience
        const dutiesContainer = element.querySelector('.duties-fields');
        if (dutiesContainer) {
            // Keep only the first duty field, remove others, and clear its value
            while (dutiesContainer.children.length > 1) {
                dutiesContainer.removeChild(dutiesContainer.lastChild);
            }
            const firstDutyInput = dutiesContainer.querySelector('.duty-field input');
            if (firstDutyInput) {
                firstDutyInput.value = '';
            }
             // Ensure the remove button is present even if it was the only one
             const firstDutyRemoveButton = dutiesContainer.querySelector('.duty-field .remove-duty');
             if(firstDutyRemoveButton && dutiesContainer.children.length === 1){
                // Optional: Decide if the first duty should have a remove button visible initially
             }
        }
         // Clear any validation error messages within the cloned element
        element.querySelectorAll('.text-red-500.text-xs.mt-1').forEach(errorMsg => errorMsg.remove());
        element.querySelectorAll('.border-red-500').forEach(errorField => errorField.classList.remove('border-red-500'));

        // Ensure remove button exists on cloned blocks (except potentially the first one after cloning)
        const removeButtonClasses = ['remove-experience', 'remove-education', 'remove-language', 'remove-reference', 'remove-additional-info'];
        removeButtonClasses.forEach(cls => {
            let removeBtn = element.querySelector(`.${cls}`);
            // If the main block doesn't have one (e.g., was the very first block), add it.
            if (!removeBtn && element.classList.contains('experience-field') || element.classList.contains('education-field') || /* etc */ element.classList.contains('language-field') || element.classList.contains('reference-field') || element.classList.contains('additional-info-field')) {
                 let btnClass = '';
                 let title = '';
                 let targetClass = ''; // Class to add to button for event delegation

                 if (element.classList.contains('experience-field')) { btnClass = 'remove-experience'; title = 'Remover Experiência'; targetClass = 'remove-experience'; }
                 else if (element.classList.contains('education-field')) { btnClass = 'remove-education'; title = 'Remover Educação'; targetClass = 'remove-education'; }
                 else if (element.classList.contains('language-field')) { btnClass = 'remove-language'; title = 'Remover Idioma'; targetClass = 'remove-language'; }
                 else if (element.classList.contains('reference-field')) { btnClass = 'remove-reference'; title = 'Remover Referência'; targetClass = 'remove-reference'; }
                 else if (element.classList.contains('additional-info-field')) { btnClass = 'remove-additional-info'; title = 'Remover Informação'; targetClass = 'remove-additional-info'; }

                if(btnClass) {
                    const button = document.createElement('button');
                    button.type = 'button';
                    if(element.classList.contains('additional-info-field')) {
                         button.className = `${targetClass} text-red-500 hover:text-red-700 text-sm p-1 rounded hover:bg-red-100`;
                         button.innerHTML = '-';
                         button.title = title;
                         // For additional info, it's added next to input, not absolute
                         const inputField = element.querySelector('input');
                         if (inputField) {
                             inputField.insertAdjacentElement('afterend', button);
                         }
                    } else {
                         button.className = `absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded-full text-xs hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-1 ${targetClass}`;
                         button.title = title;
                         button.innerHTML = '✕';
                         element.prepend(button); // Or append depending on desired position relative to content
                    }
                }
            }
        });


    }

    // --- Helper Function to Update Indices and Names ---
    // baseName examples: 'experience', 'education', 'languages', 'references', 'additional_information'
    // container: The DOM element containing the fields (e.g., experienceFieldsContainer)
    function updateFieldIndices(container, baseName) {
        const fields = container.querySelectorAll(`.${baseName.replace(/_/g, '-')}-field`); // e.g., .experience-field
        let currentIndex = 0; // Use a separate counter

        fields.forEach((field) => {
            // Update IDs and names of main inputs/selects/textareas
            field.querySelectorAll(`[name^="${baseName}["]`).forEach(input => {
                const oldName = input.getAttribute('name');
                const newName = oldName.replace(new RegExp(`${baseName}\\[\\d+\\]`), `${baseName}[${currentIndex}]`);
                input.name = newName;

                 // Update associated label 'for' attribute and input 'id' if they follow a pattern
                 const oldId = input.getAttribute('id');
                 if (oldId && oldId.startsWith(baseName + '_')) {
                    const newId = oldId.replace(new RegExp(`${baseName}_\\d+_`), `${baseName}_${currentIndex}_`);
                    input.id = newId;
                    const label = field.querySelector(`label[for="${oldId}"]`);
                    if (label) {
                        label.setAttribute('for', newId);
                    }
                 }
            });

            // Specifically update nested 'duties' if it's an experience block
            if (baseName === 'experience') {
                field.querySelectorAll('[name^="experience[' + currentIndex + '][duties]"]').forEach(dutyInput => {
                    // The name should already be correct due to the previous step,
                    // but this ensures consistency if logic changes.
                    // No need to re-replace if already correct.
                });
            }

            // Show/Hide Remove button logic
             const removeButton = field.querySelector(`.remove-${baseName.replace(/_/g, '-')}`);
             if(removeButton) {
                if (fields.length > 1) {
                    removeButton.style.display = ''; // Show button
                } else {
                     removeButton.style.display = 'none'; // Hide if only one block remains
                 }
             }

            currentIndex++; // Increment index for the next field
        });
        // console.log(`Updated indices for ${baseName}. Count: ${currentIndex}`);
        return currentIndex; // Return the count of fields
    }

    // --- Generic Add Function ---
    function addBlock(container, templateSelector, baseName) {
         const template = container.querySelector(templateSelector);
         if (!template) {
             console.error(`Template not found for selector: ${templateSelector}`);
             return;
         }
         const newField = template.cloneNode(true);
         resetFields(newField);
         container.appendChild(newField);
         updateFieldIndices(container, baseName); // Update indices after adding
    }

    // --- Generic Remove Function ---
    function removeBlock(event, container, fieldSelector, baseName, minRequired = 1) {
        const fieldToRemove = event.target.closest(fieldSelector);
         if (!fieldToRemove) return;

         const fieldCount = container.querySelectorAll(fieldSelector).length;

         if (fieldCount > minRequired) {
             fieldToRemove.remove();
             updateFieldIndices(container, baseName); // Update indices after removing
         } else {
              alert(`É necessário pelo menos ${minRequired} entrada(s) para ${baseName.replace(/_/g, ' ')}.`);
              // Optionally reset the fields of the last remaining block instead of alerting
              // resetFields(fieldToRemove);
         }
    }

    // --- Add Event Listeners ---
    document.getElementById('add-experience')?.addEventListener('click', () => addBlock(experienceFieldsContainer, '.experience-field', 'experience'));
    document.getElementById('add-education')?.addEventListener('click', () => addBlock(educationFieldsContainer, '.education-field', 'education'));
    document.getElementById('add-language')?.addEventListener('click', () => addBlock(languageFieldsContainer, '.language-field', 'languages'));
    document.getElementById('add-reference')?.addEventListener('click', () => addBlock(referenceFieldsContainer, '.reference-field', 'references'));
    document.getElementById('add-additional-info')?.addEventListener('click', () => addBlock(additionalInfoFieldsContainer, '.additional-info-field', 'additional_information'));


    // --- Event Delegation for Removing Fields, Adding/Removing Duties, Checkbox ---
    document.body.addEventListener('click', function(event) {

        // Remove Experience Block
        if (event.target.classList.contains('remove-experience')) {
            removeBlock(event, experienceFieldsContainer, '.experience-field', 'experience');
        }

        // Remove Education Block
        if (event.target.classList.contains('remove-education')) {
             removeBlock(event, educationFieldsContainer, '.education-field', 'education');
        }

        // Remove Language Block
        if (event.target.classList.contains('remove-language')) {
             removeBlock(event, languageFieldsContainer, '.language-field', 'languages');
        }

         // Remove Reference Block
        if (event.target.classList.contains('remove-reference')) {
             removeBlock(event, referenceFieldsContainer, '.reference-field', 'references');
        }

         // Remove Additional Info Line
        if (event.target.classList.contains('remove-additional-info')) {
             removeBlock(event, additionalInfoFieldsContainer, '.additional-info-field', 'additional_information');
        }


        // Add Duty within an Experience Block
        if (event.target.classList.contains('add-duty')) {
            const experienceField = event.target.closest('.experience-field');
            if (!experienceField) return;

            const dutiesContainer = experienceField.querySelector('.duties-fields');
            if (!dutiesContainer) return;

            const templateDutyField = dutiesContainer.querySelector('.duty-field');
            let newDutyField;

            if (templateDutyField) {
                 newDutyField = templateDutyField.cloneNode(true);
                 newDutyField.querySelector('input').value = ''; // Clear value
                  // Ensure remove button exists
                  let removeBtn = newDutyField.querySelector('.remove-duty');
                  if (!removeBtn) {
                      removeBtn = document.createElement('button');
                      removeBtn.type = 'button';
                      removeBtn.className = 'remove-duty text-red-500 hover:text-red-700 text-sm p-1 rounded hover:bg-red-100';
                      removeBtn.title = 'Remover Responsabilidade';
                      removeBtn.innerHTML = '-';
                      newDutyField.appendChild(removeBtn);
                  }
                  removeBtn.style.display = ''; // Make sure it's visible

            } else {
                // Fallback if somehow the first duty field was removed entirely
                 newDutyField = document.createElement('div');
                 newDutyField.className = 'flex items-center space-x-2 duty-field';
                 // Determine the current experience index for the name attribute
                 const nameAttr = experienceField.querySelector('[name*="[company_name]"]')?.getAttribute('name');
                 const match = nameAttr ? nameAttr.match(/experience\[(\d+)\]/) : null;
                 const currentExpIndex = match ? match[1] : '0'; // Default to 0 if not found

                 newDutyField.innerHTML = `
                    <input type="text" name="experience[${currentExpIndex}][duties][]" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 flex-grow" placeholder="Descreva uma responsabilidade" value="">
                    <button type="button" class="remove-duty text-red-500 hover:text-red-700 text-sm p-1 rounded hover:bg-red-100" title="Remover Responsabilidade">-</button>`;
            }
             dutiesContainer.appendChild(newDutyField);
        }

        // Remove Duty within an Experience Block
        if (event.target.classList.contains('remove-duty')) {
             const dutyField = event.target.closest('.duty-field');
             if (!dutyField) return;

             const dutiesContainer = dutyField.parentElement;
             if (dutiesContainer && dutiesContainer.querySelectorAll('.duty-field').length > 1) {
                 dutyField.remove();
             } else {
                 // If it's the last one, just clear the input
                 const input = dutyField.querySelector('input');
                 if (input) input.value = '';
                 // Optionally hide the remove button for the last duty
                 // event.target.style.display = 'none';
             }
        }

    });

    // --- Event Delegation for 'Current Job' Checkbox ---
     document.body.addEventListener('change', function(event) {
         if (event.target.classList.contains('current-job-checkbox')) {
             const experienceField = event.target.closest('.experience-field');
             if (!experienceField) return;

             const endDateInput = experienceField.querySelector('.end-date-input');
             if (endDateInput) {
                 endDateInput.disabled = event.target.checked;
                 if (event.target.checked) {
                     endDateInput.value = ''; // Clear end date if current is checked
                 }
             }
         }
     });

     // --- Initial Setup on Load ---
     // Ensure correct state for 'Current Job' checkboxes and remove buttons
     [experienceFieldsContainer, educationFieldsContainer, languageFieldsContainer, referenceFieldsContainer, additionalInfoFieldsContainer].forEach(container => {
         if (container) {
             const baseName = container.id.split('-')[0]; // e.g., 'experience' from 'experience-fields'
             if(baseName) {
                 updateFieldIndices(container, baseName);
             }
         }
     });

      // Initial check for 'Current' checkboxes disabling end dates
     document.querySelectorAll('.current-job-checkbox:checked').forEach(checkbox => {
         const experienceField = checkbox.closest('.experience-field');
         const endDateInput = experienceField?.querySelector('.end-date-input');
         if (endDateInput) {
             endDateInput.disabled = true;
         }
     });


    console.log("CV Form Script Initialized Successfully.");

});
</script>
@endpush

**Key Changes/Improvements in `homeform02.blade.php`:**

1.  **Extends Layout:** Uses `@extends('layouts.app')`.
2.  **JavaScript Placement:** The entire `<script>` block is wrapped in `@push('scripts') ... @endpush`. This pushes the script to the `@stack('scripts')` location in `app.blade.php`, ensuring it loads after the main layout HTML and only on this page.
3.  **Blade Syntax for Old Data & Errors:**
    *   Used `@forelse... @empty... @endforelse` loops for repeatable sections (Experience, Education, etc.) to handle both cases where `old()` data exists (after a validation error) and the initial empty state. The `old('experience', [[]])` pattern provides a default empty item to ensure at least one block shows initially.
    *   Added `@error('field_name') ... @enderror` directives below relevant fields to display specific validation errors.
    *   Used `{{ old('field_name', 'default_value') }}` to repopulate fields after validation errors.
4.  **HTML Structure & Semantics:**
    *   Wrapped logical sections (Personal Details, Experience, etc.) in `<fieldset>` tags with `<legend>` for better structure and accessibility.
    *   Used more appropriate input types (`url`, `tel`, `month` for dates where only month/year is needed). Using `type="month"` provides a better UI on supporting browsers. Added `pattern` as a fallback.
    *   Added `required` attribute directly to necessary fields (though server-side validation is still essential).
    *   Added `<span class="text-red-500">*</span>` to required field labels.
    *   Improved placeholder text.
    *   Used `sr-only` class for labels where the context is clear (like the main Summary textarea).
5.  **Dynamic Field Handling (JS):**
    *   **Refactored JS:** Created generic `addBlock` and `removeBlock` functions to reduce code duplication.
    *   **Improved Indexing:** The `updateFieldIndices` function is now more robust, updating input/select/textarea names *and* IDs, plus associated label `for` attributes. It also correctly handles nested fields like 'duties'.
    *   **Remove Button Logic:** Remove buttons are now correctly added to cloned blocks and hidden/shown based on whether it's the last remaining block. Used a cleaner 'X' symbol.
    *   **Reset Fields:** The `resetFields` function is improved to clear various input types, handle the 'current job' checkbox state correctly, manage nested 'duties', and clear validation error styles/messages from cloned blocks.
    *   **Event Delegation:** Still using event delegation for adding/removing, which is efficient. Added `change` delegation specifically for the 'current job' checkbox.
    *   **Initial State:** Added code to run `updateFieldIndices` on page load for all repeatable sections to ensure the initial remove button visibility is correct. Also checks initial state of 'current' checkboxes.
6.  **Styling:** Added better styling for error messages and field error states (`border-red-500`). Improved button styles and hover effects. Used fieldset/legend styling.

**3. Define Routes (`routes/web.php`)**

Make sure you have routes defined in `routes/web.php` similar to this:

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CvController; // Assuming you have a CvController
use App\Http\Controllers\WelcomeController; // Assuming a controller for the welcome page
use Illuminate\Support\Facades\Auth; // For Auth routes

// Welcome Page (Linked from "Início" button)
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Route for the "Criar CV" button - Displays the form
// Ensure CvController exists and has a 'create' method that returns 'homeform02' view
Route::get('/criar-cv', [CvController::class, 'create'])->name('home')->middleware('auth'); // Added auth middleware - user must be logged in

// Route where the form submits its data for processing/preview
// Ensure CvController exists and has a 'preview' method
Route::post('/cv/preview', [CvController::class, 'preview'])->name('cv.preview')->middleware('auth'); // Added auth middleware

// Route for displaying template options (linked from Logo)
// Ensure CvController exists and has a 'showTemplates' method
Route::get('/cv/templates', [CvController::class, 'showTemplates'])->name('cv.templates')->middleware('auth'); // Added auth middleware


// Laravel's built-in authentication routes (Login, Register, Logout etc.)
Auth::routes();

// Optional: Redirect after login (you might have this in RouteServiceProvider or Fortify/Jetstream config)
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Example route if you don't have a WelcomeController yet
// Route::get('/', function () {
//     return view('welcome'); // Assuming you have a resources/views/welcome.blade.php
// })->name('welcome');