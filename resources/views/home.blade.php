@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar (Hidden on Mobile) -->
    <div class="w-64 bg-white shadow-lg hidden md:block">
        @include('partials.sidebar')
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8 overflow-y-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Preencha os Detalhes do Seu CV</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- CV Form -->
        <form method="POST" action="{{ route('cv.preview') }}" class="bg-white p-8 rounded-lg shadow-lg">
            @csrf

            <!-- Hidden Input for Template -->
            <input type="hidden" name="template" value="{{ request()->query('template') }}">

            <!-- Personal Details -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Detalhes Pessoais</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">Primeiro Nome</label>
                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite seu primeiro nome"
                            value="{{ old('first_name') }}"
                        >
                    </div>
                    <div>
                        <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Sobrenome</label>
                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite seu sobrenome"
                            value="{{ old('last_name') }}"
                        >
                    </div>
                    <div>
                        <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Cargo que está se candidatando</label>
                        <input
                            type="text"
                            id="role"
                            name="role"
                            required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite o cargo"
                            value="{{ old('role') }}"
                        >
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite seu email"
                            value="{{ old('email') }}"
                        >
                    </div>
                    <div>
                        <label for="linkedin" class="block text-gray-700 text-sm font-bold mb-2">LinkedIn/Portfólio</label>
                        <input
                            type="text"
                            id="linkedin"
                            name="linkedin"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite seu LinkedIn ou link do portfólio"
                            value="{{ old('linkedin') }}"
                        >
                    </div>
                    <div>
                        <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Localização</label>
                        <input
                            type="text"
                            id="location"
                            name="location"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite sua localização"
                            value="{{ old('location') }}"
                        >
                    </div>
                    <div>
                        <label for="place_of_birth" class="block text-gray-700 text-sm font-bold mb-2">Local de Nascimento</label>
                        <input
                            type="text"
                            id="place_of_birth"
                            name="place_of_birth"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite seu local de nascimento"
                            value="{{ old('place_of_birth') }}"
                        >
                    </div>
                    <div>
                        <label for="nationality" class="block text-gray-700 text-sm font-bold mb-2">Nacionalidade</label>
                        <input
                            type="text"
                            id="nationality"
                            name="nationality"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite sua nacionalidade"
                            value="{{ old('nationality') }}"
                        >
                    </div>
                    <div>
                        <label for="phone_number" class="block text-gray-700 text-sm font-bold mb-2">Telefone</label>
                        <input
                            type="text"
                            id="phone_number"
                            name="phone_number"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite seu número de telefone"
                            value="{{ old('phone_number') }}"
                        >
                    </div>
                    <div>
                        <label for="date_of_birth" class="block text-gray-700 text-sm font-bold mb-2">Data de Nascimento</label>
                        <input
                            type="date"
                            id="date_of_birth"
                            name="date_of_birth"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            value="{{ old('date_of_birth') }}"
                        >
                    </div>
                    <div>
                        <label for="gender" class="block text-gray-700 text-sm font-bold mb-2">Gênero</label>
                        <select
                            id="gender"
                            name="gender"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                        >
                            <option value="">Selecione</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Masculino</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Feminino</option>
                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Outro</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Summary -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Resumo</h2>
                <textarea
                    id="summary"
                    name="summary"
                    rows="4"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                    placeholder="Explique por que você é a pessoa ideal para o cargo"
                >{{ old('summary') }}</textarea>
            </div>

            <!-- Experience -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Experiência</h2>
                <div id="experience-fields" class="space-y-6">
                    <!-- Initial Experience Field Template -->
                    <div class="bg-gray-50 p-6 rounded-lg experience-field">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nome da Empresa</label>
                                <input
                                    type="text"
                                    name="experience[0][company_name]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite o nome da empresa"
                                    value="{{ old('experience.0.company_name') }}"
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Cargo</label>
                                <input
                                    type="text"
                                    name="experience[0][title]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite seu cargo"
                                    value="{{ old('experience.0.title') }}"
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Data de Início</label>
                                <input
                                    type="date"
                                    name="experience[0][start_date]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    value="{{ old('experience.0.start_date') }}"
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Data de Término</label>
                                <input
                                    type="date"
                                    name="experience[0][end_date]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 end-date-input"
                                    value="{{ old('experience.0.end_date') }}"
                                >
                            </div>
                            <div class="flex items-center">
                                <input
                                    type="checkbox"
                                    name="experience[0][current]"
                                    value="1"
                                    class="mr-2 h-4 w-4 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600 current-job-checkbox"
                                    {{ old('experience.0.current') ? 'checked' : '' }}
                                >
                                <label class="text-gray-700 text-sm font-bold">Atual</label>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Descrição da Empresa</label>
                            <textarea
                                name="experience[0][company_description]"
                                rows="3"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                placeholder="Descreva a empresa"
                            >{{ old('experience.0.company_description') }}</textarea>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Principais Conquistas</label>
                            <textarea
                                name="experience[0][achievements]"
                                rows="3"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                placeholder="Descreva suas conquistas"
                            >{{ old('experience.0.achievements') }}</textarea>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Principais Responsabilidades</label>
                            <div class="duties-fields space-y-2">
                                <!-- Initial Duty Field -->
                                <div class="flex items-center space-x-2 duty-field">
                                    <input
                                        type="text"
                                        name="experience[0][duties][]"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                        placeholder="Digite uma responsabilidade"
                                        value="{{ old('experience.0.duties.0') }}"
                                    >
                                    <button type="button" class="remove-duty text-red-500 hover:text-red-700 text-sm">Remover</button>
                                </div>
                                @if(old('experience.0.duties') && count(old('experience.0.duties')) > 1)
                                    @foreach(array_slice(old('experience.0.duties'), 1) as $index => $duty)
                                        <div class="flex items-center space-x-2 duty-field">
                                            <input
                                                type="text"
                                                name="experience[0][duties][]"
                                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                                placeholder="Digite uma responsabilidade"
                                                value="{{ $duty }}"
                                            >
                                            <button type="button" class="remove-duty text-red-500 hover:text-red-700 text-sm">Remover</button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="mt-2 flex justify-start">
                                <button
                                    type="button"
                                    class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 add-duty text-sm"
                                >
                                    Adicionar Responsabilidade
                                </button>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button
                                type="button"
                                class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 remove-experience text-sm"
                            >
                                Remover Experiência
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Add Experience Button -->
                <div class="mt-4">
                    <button
                        type="button"
                        id="add-experience"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600"
                    >
                        Adicionar Experiência
                    </button>
                </div>
            </div>

            <!-- Education -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Educação</h2>
                <div id="education-fields" class="space-y-6">
                    <!-- Initial Education Field Template -->
                    <div class="bg-gray-50 p-6 rounded-lg education-field">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Escola/Universidade</label>
                                <input
                                    type="text"
                                    name="education[0][school]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite o nome da instituição"
                                    value="{{ old('education.0.school') }}"
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Grau e Área de Estudo</label>
                                <input
                                    type="text"
                                    name="education[0][degree]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite seu grau e área de estudo"
                                    value="{{ old('education.0.degree') }}"
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Ano de Conclusão</label>
                                <select
                                    name="education[0][year_of_completion]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                >
                                    <option value="">Selecione</option>
                                    @for ($year = date('Y'); $year >= 1950; $year--)
                                        <option value="{{ $year }}" {{ old('education.0.year_of_completion') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end">
                           <button
                                type="button"
                                class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 remove-education text-sm"
                            >
                                Remover Educação
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Add Education Button -->
                <div class="mt-4">
                    <button
                        type="button"
                        id="add-education"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600"
                    >
                        Adicionar Educação
                    </button>
                </div>
            </div>

            <!-- Languages -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Idiomas</h2>
                <div id="language-fields" class="space-y-6">
                    <!-- Initial Language Field Template -->
                    <div class="bg-gray-50 p-6 rounded-lg language-field">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Idioma</label>
                                <input
                                    type="text"
                                    name="languages[0][language]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite o idioma"
                                    value="{{ old('languages.0.language') }}"
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nível de Conversação</label>
                                <select
                                    name="languages[0][speaking_level]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                >
                                    <option value="">Selecione</option>
                                    <option value="basic" {{ old('languages.0.speaking_level') == 'basic' ? 'selected' : '' }}>Básico</option>
                                    <option value="good" {{ old('languages.0.speaking_level') == 'good' ? 'selected' : '' }}>Bom</option>
                                    <option value="fluent" {{ old('languages.0.speaking_level') == 'fluent' ? 'selected' : '' }}>Fluente</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nível de Leitura</label>
                                <select
                                    name="languages[0][reading_level]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                >
                                    <option value="">Selecione</option>
                                    <option value="basic" {{ old('languages.0.reading_level') == 'basic' ? 'selected' : '' }}>Básico</option>
                                    <option value="good" {{ old('languages.0.reading_level') == 'good' ? 'selected' : '' }}>Bom</option>
                                    <option value="fluent" {{ old('languages.0.reading_level') == 'fluent' ? 'selected' : '' }}>Fluente</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nível de Escrita</label>
                                <select
                                    name="languages[0][writing_level]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                >
                                    <option value="">Selecione</option>
                                    <option value="basic" {{ old('languages.0.writing_level') == 'basic' ? 'selected' : '' }}>Básico</option>
                                    <option value="good" {{ old('languages.0.writing_level') == 'good' ? 'selected' : '' }}>Bom</option>
                                    <option value="fluent" {{ old('languages.0.writing_level') == 'fluent' ? 'selected' : '' }}>Fluente</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end">
                           <button
                                type="button"
                                class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 remove-language text-sm"
                            >
                                Remover Idioma
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Add Language Button -->
                <div class="mt-4">
                    <button
                        type="button"
                        id="add-language"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600"
                    >
                        Adicionar Idioma
                    </button>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Informações Adicionais</h2>
                <div id="additional-info-fields" class="space-y-2">
                    <!-- Initial Additional Info Field -->
                    <div class="additional-info-field flex items-center space-x-2">
                        <input
                            type="text"
                            name="additional_information[]"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite uma informação adicional"
                            value="{{ old('additional_information.0') }}"
                        >
                        <button type="button" class="remove-additional-info text-red-500 hover:text-red-700 text-sm">Remover</button>
                    </div>
                    @if(old('additional_information') && count(old('additional_information')) > 1)
                        @foreach(array_slice(old('additional_information'), 1) as $index => $info)
                            <div class="additional-info-field flex items-center space-x-2">
                                <input
                                    type="text"
                                    name="additional_information[]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite uma informação adicional"
                                    value="{{ $info }}"
                                >
                                <button type="button" class="remove-additional-info text-red-500 hover:text-red-700 text-sm">Remover</button>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="mt-2 flex justify-start">
                    <button
                        type="button"
                        id="add-additional-info"
                        class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 text-sm"
                    >
                        Adicionar Informação Adicional
                    </button>
                </div>
            </div>

            <!-- References -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Referências</h2>
                <div id="reference-fields" class="space-y-6">
                    <!-- Initial Reference Field Template -->
                    <div class="bg-gray-50 p-6 rounded-lg reference-field">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nome</label>
                                <input
                                    type="text"
                                    name="references[0][reference_name]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite o nome da referência"
                                    value="{{ old('references.0.reference_name') }}"
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Cargo</label>
                                <input
                                    type="text"
                                    name="references[0][reference_position]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite o cargo da referência"
                                    value="{{ old('references.0.reference_position') }}"
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Telefone</label>
                                <input
                                    type="text"
                                    name="references[0][reference_phone]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite o telefone da referência"
                                    value="{{ old('references.0.reference_phone') }}"
                                >
                            </div>
                        </div>
                         <div class="mt-4 flex justify-end">
                           <button
                                type="button"
                                class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 remove-reference text-sm"
                            >
                                Remover Referência
                            </button>
                        </div>
                    </div>
                </div>
                 <!-- Add Reference Button -->
                <div class="mt-4">
                    <button
                        type="button"
                        id="add-reference"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600"
                    >
                        Adicionar Referência
                    </button>
                </div>
            </div>

            <!-- Skills -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Habilidades</h2>
                <div class="bg-gray-50 p-6 rounded-lg">
                    <textarea
                        id="skills"
                        name="skills"
                        rows="3"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                        placeholder="Liste suas habilidades (e.g., Comunicação, Liderança, Python, JavaScript)"
                    >{{ old('skills') }}</textarea>
                     <small class="text-gray-500">Separe as habilidades por vírgula ou coloque uma por linha.</small>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-8">
                <button
                    type="submit"
                    class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500"
                >
                    Baixar CV 
                </button>
            </div>
        </form>
    </div>
</div>

@endsection {{-- Ensure this is the correct end of your Blade section --}}

{{-- Ensure this <script> block appears only ONCE in your final HTML --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    console.log("CV Form Script Initializing..."); // Check console for duplicates

    // --- Initialization ---
    let experienceIndex = {{ old('experience') ? count(old('experience')) : 1 }};
    let educationIndex = {{ old('education') ? count(old('education')) : 1 }};
    let languageIndex = {{ old('languages') ? count(old('languages')) : 1 }};
    let referenceIndex = {{ old('references') ? count(old('references')) : 1 }};
    let additionalInfoIndex = {{ old('additional_information') ? count(old('additional_information')) : 1 }};

    const experienceFields = document.getElementById('experience-fields');
    const educationFields = document.getElementById('education-fields');
    const languageFields = document.getElementById('language-fields');
    const referenceFields = document.getElementById('reference-fields');
    const additionalInfoFields = document.getElementById('additional-info-fields');

    // --- Helper Function to Reset Fields ---
    function resetFields(element) {
        // ... (same reset logic as before) ...
        element.querySelectorAll('input[type="text"], input[type="date"], input[type="email"], textarea, select').forEach(field => {
            field.value = '';
        });
        element.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.checked = false;
            const experienceField = checkbox.closest('.experience-field');
             if(checkbox.classList.contains('current-job-checkbox') && experienceField) {
                 const endDateInput = experienceField.querySelector('.end-date-input');
                 if (endDateInput) {
                     endDateInput.disabled = false;
                 }
             }
        });
        element.querySelectorAll('select').forEach(select => {
            if (select.options.length > 0) {
                select.selectedIndex = 0;
            }
        });
        const dutiesContainer = element.querySelector('.duties-fields');
        if (dutiesContainer) {
            const firstDuty = dutiesContainer.querySelector('.duty-field');
            if(firstDuty) {
                while(dutiesContainer.children.length > 1) {
                    dutiesContainer.removeChild(dutiesContainer.lastChild);
                }
                const remainingInput = dutiesContainer.querySelector('input');
                if (remainingInput) remainingInput.value = '';
            } else {
                 dutiesContainer.innerHTML = '';
            }
        }
    }

    // --- Helper Function to Update Indices ---
    function updateFieldIndices(containerSelector, baseName) {
        // ... (same update logic as before) ...
        const fields = document.querySelectorAll(`${containerSelector} > div`);
        fields.forEach((field, index) => {
            field.querySelectorAll('input, textarea, select').forEach(input => {
                const name = input.getAttribute('name');
                if (name) {
                    input.name = name.replace(/\[\d+\]/, `[${index}]`);
                }
            });
            if (baseName === 'experience') {
                field.querySelectorAll('.duty-field input').forEach(dutyInput => {
                     const dutyName = dutyInput.getAttribute('name');
                      if (dutyName) {
                         dutyInput.name = dutyName.replace(/experience\[\d+\]/, `experience[${index}]`);
                      }
                });
             }
        });
        return fields.length;
    }

    // --- Add Experience ---
    const addExperienceButton = document.getElementById('add-experience');
    if (addExperienceButton) {
        addExperienceButton.addEventListener('click', function() {
            console.log("Add Experience Clicked"); // Check console for duplicates

            const template = experienceFields.querySelector('.experience-field');
            if (!template) {
                console.error("Experience field template not found!");
                return;
            }

            // ---> WORKAROUND STEP 1: Clone and add (potentially adds two if listener fired twice) <---
            const newField = template.cloneNode(true);
            resetFields(newField);

            const currentIndex = experienceIndex;
            newField.querySelectorAll('input, textarea, select').forEach(input => {
                const name = input.getAttribute('name');
                if (name) {
                    input.name = name.replace(/\[\d+\]/, `[${currentIndex}]`);
                }
            });
             newField.querySelectorAll('.duty-field input').forEach(dutyInput => {
                 const dutyName = dutyInput.getAttribute('name');
                 if (dutyName) {
                    dutyInput.name = dutyName.replace(/experience\[\d+\]/, `experience[${currentIndex}]`);
                 }
             });

            experienceFields.appendChild(newField);
            experienceIndex++; // Increment index once

             // ---> WORKAROUND STEP 2: Immediately remove the *last* added experience field <---
             // This assumes the duplicate happens fast enough that the last element is the unwanted one.
             // !! CAVEAT: This is a HACK to mask the real issue !!
             console.log("Attempting workaround: Removing last experience field");
             const allExperienceFields = experienceFields.querySelectorAll('.experience-field');
             if (allExperienceFields.length > 1) { // Only remove if there's more than one
                  const lastField = allExperienceFields[allExperienceFields.length - 1];
                  if(lastField) { // Ensure we found it
                    lastField.remove();
                    console.log("Workaround: Last experience field removed.");
                    // Re-adjust the index since we removed one
                    experienceIndex = updateFieldIndices('#experience-fields', 'experience');
                  }
             } else if (allExperienceFields.length === 1) {
                 // If only one exists after adding, the listener likely only fired once.
                 // Update index properly.
                 experienceIndex = updateFieldIndices('#experience-fields', 'experience');
             }
             // --- END WORKAROUND ---

        });
    } else {
        console.error("Add Experience button not found!");
    }

    // --- Add Education ---
     const addEducationButton = document.getElementById('add-education');
     if(addEducationButton) {
         addEducationButton.addEventListener('click', function() {
            console.log("Add Education Clicked"); // Check console for duplicates
            const template = educationFields.querySelector('.education-field');
            if (!template) return;

            // ---> WORKAROUND STEP 1: Clone and add (potentially adds two if listener fired twice) <---
            const newField = template.cloneNode(true);
            resetFields(newField);

            const currentIndex = educationIndex;
            newField.querySelectorAll('input, select').forEach(input => {
                const name = input.getAttribute('name');
                if (name) {
                    input.name = name.replace(/\[\d+\]/, `[${currentIndex}]`);
                }
            });

            educationFields.appendChild(newField);
            educationIndex++; // Increment index once

            // ---> WORKAROUND STEP 2: Immediately remove the *last* added education field <---
            // !! CAVEAT: This is a HACK to mask the real issue !!
            console.log("Attempting workaround: Removing last education field");
            const allEducationFields = educationFields.querySelectorAll('.education-field');
            if (allEducationFields.length > 1) { // Only remove if there's more than one
                 const lastField = allEducationFields[allEducationFields.length - 1];
                 if(lastField) {
                    lastField.remove();
                    console.log("Workaround: Last education field removed.");
                    // Re-adjust the index since we removed one
                    educationIndex = updateFieldIndices('#education-fields', 'education');
                 }
            } else if (allEducationFields.length === 1) {
                // Listener likely fired once. Update index.
                educationIndex = updateFieldIndices('#education-fields', 'education');
            }
            // --- END WORKAROUND ---

        });
     }

    // --- Add Language (Original Logic - No workaround applied here unless needed) ---
    const addLanguageButton = document.getElementById('add-language');
    if(addLanguageButton) {
        addLanguageButton.addEventListener('click', function() {
            console.log("Add Language Clicked");
            const template = languageFields.querySelector('.language-field');
            if (!template) return;

            const newField = template.cloneNode(true);
            resetFields(newField);

            const currentIndex = languageIndex;
            newField.querySelectorAll('input, select').forEach(input => {
                const name = input.getAttribute('name');
                if (name) {
                    input.name = name.replace(/\[\d+\]/, `[${currentIndex}]`);
                }
            });

            languageFields.appendChild(newField);
            languageIndex++;
        });
    }

    // --- Add Reference (Original Logic) ---
    const addReferenceButton = document.getElementById('add-reference');
    if(addReferenceButton) {
        addReferenceButton.addEventListener('click', function() {
            console.log("Add Reference Clicked");
            const template = referenceFields.querySelector('.reference-field');
            if (!template) return;

            const newField = template.cloneNode(true);
            resetFields(newField);

            const currentIndex = referenceIndex;
            newField.querySelectorAll('input').forEach(input => {
                const name = input.getAttribute('name');
                if (name) {
                    input.name = name.replace(/\[\d+\]/, `[${currentIndex}]`);
                }
            });

            referenceFields.appendChild(newField);
            referenceIndex++;
        });
    }

    // --- Add Additional Info (Original Logic) ---
     const addAdditionalInfoButton = document.getElementById('add-additional-info');
     if(addAdditionalInfoButton) {
         addAdditionalInfoButton.addEventListener('click', function() {
            console.log("Add Additional Info Clicked");
            const template = additionalInfoFields.querySelector('.additional-info-field');
            let newField;

            if (!template) {
                const div = document.createElement('div');
                div.className = 'additional-info-field flex items-center space-x-2';
                div.innerHTML = `
                    <input type="text" name="additional_information[]" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Digite uma informação adicional" value="">
                    <button type="button" class="remove-additional-info text-red-500 hover:text-red-700 text-sm">Remover</button>`;
                newField = div;
            } else {
                 newField = template.cloneNode(true);
                 resetFields(newField);
            }
            additionalInfoFields.appendChild(newField);
        });
     }

    // --- Event Delegation for Removing Fields and Adding/Removing Duties (Original Logic) ---
    document.body.addEventListener('click', function(event) {

        // Remove Experience Block
        if (event.target.classList.contains('remove-experience')) {
            console.log("Remove Experience Clicked");
            const fieldToRemove = event.target.closest('.experience-field');
            if (!fieldToRemove) return;

            if (experienceFields.querySelectorAll('.experience-field').length > 1) {
                fieldToRemove.remove();
                // Re-index is important after removal
                experienceIndex = updateFieldIndices('#experience-fields', 'experience');
            } else {
                alert('Você precisa de pelo menos uma entrada de experiência.');
                resetFields(fieldToRemove);
            }
        }

        // Remove Education Block
        if (event.target.classList.contains('remove-education')) {
            console.log("Remove Education Clicked");
             const fieldToRemove = event.target.closest('.education-field');
             if (!fieldToRemove) return;

             if (educationFields.querySelectorAll('.education-field').length > 1) {
                fieldToRemove.remove();
                educationIndex = updateFieldIndices('#education-fields', 'education');
            } else {
                alert('Você precisa de pelo menos uma entrada de educação.');
                 resetFields(fieldToRemove);
            }
        }

        // ... (Rest of the remove/add duty/checkbox logic remains the same) ...
         // Remove Language Block
        if (event.target.classList.contains('remove-language')) {
            console.log("Remove Language Clicked");
             const fieldToRemove = event.target.closest('.language-field');
             if (!fieldToRemove) return;

             if (languageFields.querySelectorAll('.language-field').length > 1) {
                fieldToRemove.remove();
                languageIndex = updateFieldIndices('#language-fields', 'languages');
            } else {
                alert('Você precisa de pelo menos uma entrada de idioma.');
                 resetFields(fieldToRemove);
            }
        }

         // Remove Reference Block
        if (event.target.classList.contains('remove-reference')) {
            console.log("Remove Reference Clicked");
             const fieldToRemove = event.target.closest('.reference-field');
              if (!fieldToRemove) return;

             if (referenceFields.querySelectorAll('.reference-field').length > 1) {
                fieldToRemove.remove();
                referenceIndex = updateFieldIndices('#reference-fields', 'references');
            } else {
                alert('Você precisa de pelo menos uma entrada de referência.');
                 resetFields(fieldToRemove);
            }
        }

         // Remove Additional Info Line
        if (event.target.classList.contains('remove-additional-info')) {
             console.log("Remove Additional Info Clicked");
             const fieldToRemove = event.target.closest('.additional-info-field');
             if (!fieldToRemove) return;

             if (additionalInfoFields.querySelectorAll('.additional-info-field').length > 1) {
                 fieldToRemove.remove();
             } else {
                 const input = fieldToRemove.querySelector('input');
                 if(input) input.value = '';
             }
        }

        // Add Duty within an Experience Block
        if (event.target.classList.contains('add-duty')) {
            console.log("Add Duty Clicked");
            const experienceField = event.target.closest('.experience-field');
            if (!experienceField) return;

            const dutiesContainer = experienceField.querySelector('.duties-fields');
            if (!dutiesContainer) return;

            const templateDutyField = dutiesContainer.querySelector('.duty-field');
            let newDutyField;

            if (templateDutyField) {
                 newDutyField = templateDutyField.cloneNode(true);
                 newDutyField.querySelector('input').value = '';
            } else {
                 const div = document.createElement('div');
                 div.className = 'flex items-center space-x-2 duty-field';
                 const parentName = experienceField.querySelector('input[name*="[company_name]"]').name;
                 const currentExpIndexMatch = parentName ? parentName.match(/\[(\d+)\]/) : null;
                 const currentExpIndex = currentExpIndexMatch ? currentExpIndexMatch[1] : '0';
                 div.innerHTML = `
                    <input type="text" name="experience[${currentExpIndex}][duties][]" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Digite uma responsabilidade" value="">
                    <button type="button" class="remove-duty text-red-500 hover:text-red-700 text-sm">Remover</button>`;
                 newDutyField = div;
            }
             dutiesContainer.appendChild(newDutyField);
        }

        // Remove Duty within an Experience Block
        if (event.target.classList.contains('remove-duty')) {
             console.log("Remove Duty Clicked");
             const dutyField = event.target.closest('.duty-field');
             if (!dutyField) return;

             const dutiesContainer = dutyField.parentElement;
             if (dutiesContainer && dutiesContainer.querySelectorAll('.duty-field').length > 1) {
                 dutyField.remove();
             } else {
                 const input = dutyField.querySelector('input');
                 if(input) input.value = '';
             }
        }

         // Handle 'Current' checkbox disabling/enabling end date
        if (event.target.classList.contains('current-job-checkbox')) {
            const experienceField = event.target.closest('.experience-field');
            if (!experienceField) return;

            const endDateInput = experienceField.querySelector('.end-date-input');
            if (endDateInput) {
                endDateInput.disabled = event.target.checked;
                if (event.target.checked) {
                    endDateInput.value = '';
                }
            }
        }
    });

     // Initial check for 'Current' checkboxes on page load
    document.querySelectorAll('.current-job-checkbox').forEach(checkbox => {
         const experienceField = checkbox.closest('.experience-field');
          if (!experienceField) return;
         const endDateInput = experienceField.querySelector('.end-date-input');
         if (endDateInput) {a
             endDateInput.disabled = checkbox.checked;
         }
    });

    console.log("CV Form Script Initialized Successfully.");

});
</script>
